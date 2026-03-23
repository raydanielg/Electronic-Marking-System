<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\School;
use Illuminate\Http\Request;

use App\Models\AcademicLevel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class StudentController extends Controller
{
    public function importPage()
    {
        $schools = School::orderBy('name')->get(['id', 'name']);
        $levels = AcademicLevel::orderBy('sort_order')->get(['id', 'name']);
        return view('manager.students.import', compact('schools', 'levels'));
    }

    public function preview(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xlsx,xls',
            'school_id' => 'required|exists:schools,id',
            'level_id' => 'required|exists:academic_levels,id',
        ]);

        $file = $request->file('import_file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        // Remove header row
        array_shift($rows);

        $data = [];
        foreach ($rows as $row) {
            if (empty($row[0])) continue; // Skip empty rows

            $firstName = $row[0] ?? '';
            $middleName = $row[1] ?? '';
            $lastName = $row[2] ?? '';
            $sex = $row[3] ?? 'Male';
            $premNumber = $row[4] ?? '';

            $fullName = trim($firstName . ' ' . $middleName . ' ' . $lastName);
            
            // Basic validation for preview
            $status = 'valid';
            $message = '';

            if (empty($firstName) || empty($lastName)) {
                $status = 'invalid';
                $message = 'Name is required';
            }

            $data[] = [
                'first_name' => $firstName,
                'middle_name' => $middleName,
                'last_name' => $lastName,
                'full_name' => $fullName,
                'sex' => in_array($sex, ['Male', 'Female']) ? $sex : 'Male',
                'prem_number' => $premNumber,
                'school_id' => $request->school_id,
                'level_id' => $request->level_id,
                'status' => $status,
                'message' => $message
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'students' => 'required|array',
            'school_id' => 'required|exists:schools,id',
            'level_id' => 'required|exists:academic_levels,id',
        ]);

        $level = AcademicLevel::find($request->level_id);
        $importedCount = 0;

        foreach ($request->students as $studentData) {
            Student::create([
                'first_name' => $studentData['first_name'],
                'middle_name' => $studentData['middle_name'],
                'last_name' => $studentData['last_name'],
                'full_name' => $studentData['full_name'],
                'sex' => $studentData['sex'],
                'prem_number' => $studentData['prem_number'],
                'school_id' => $request->school_id,
                'current_level' => $level->name, // Mapping level name to current_level for now
                'status' => 'Admitted',
                'is_active' => true,
            ]);
            $importedCount++;
        }

        return response()->json([
            'success' => true,
            'message' => "Successfully imported {$importedCount} students."
        ]);
    }

    public function downloadTemplate()
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Headers
        $headers = ['First Name', 'Middle Name', 'Last Name', 'Sex (Male/Female)', 'Examination Number'];
        $column = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($column . '1', $header);
            $column++;
        }

        // Sample Data
        $sheet->setCellValue('A2', 'JOHN');
        $sheet->setCellValue('B2', 'DOE');
        $sheet->setCellValue('C2', 'SMITH');
        $sheet->setCellValue('D2', 'Male');
        $sheet->setCellValue('E2', 'S0123/0001/2024');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="student_import_template.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    public function getLevelsByType($type)
    {
        $levels = AcademicLevel::where('education_type', $type)
            ->orderBy('sort_order')
            ->get(['id', 'name']);
        return response()->json($levels);
    }

    public function index(Request $request)
    {
        $query = Student::with('school');

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('prem_number', 'like', "%{$search}%")
                  ->orWhere('admission_number', 'like', "%{$search}%");
            });
        }

        // School filter
        if ($request->filled('school_id')) {
            $query->where('school_id', $request->school_id);
        }

        // Sex filter
        if ($request->filled('sex')) {
            $query->where('sex', $request->sex);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $students = $query->latest()->paginate(15)->withQueryString();
        $schools = School::orderBy('name')->get(['id', 'name']);

        return view('manager.students.index', compact('students', 'schools'));
    }

    public function create()
    {
        $schools = School::orderBy('name')->get(['id', 'name']);
        return view('manager.students.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'sex' => 'required|in:Male,Female',
            'date_of_birth' => 'nullable|date',
            'school_id' => 'required|exists:schools,id',
            'prem_number' => 'nullable|string|unique:students,prem_number',
            'admission_number' => 'nullable|string',
            'admission_date' => 'nullable|date',
            'current_level' => 'nullable|integer',
            'current_class' => 'nullable|string|max:255',
            'status' => 'required|string',
            'parent_name' => 'nullable|string|max:255',
            'parent_phone' => 'nullable|string|max:255',
        ]);

        $validated['full_name'] = trim($validated['first_name'] . ' ' . ($validated['middle_name'] ?? '') . ' ' . $validated['last_name']);
        
        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function show(Student $student)
    {
        return response()->json([
            'success' => true,
            'student' => $student->load('school')
        ]);
    }

    public function edit(Student $student)
    {
        $schools = School::orderBy('name')->get(['id', 'name']);
        return view('manager.students.edit', compact('student', 'schools'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'sex' => 'required|in:Male,Female',
            'date_of_birth' => 'nullable|date',
            'school_id' => 'required|exists:schools,id',
            'prem_number' => 'nullable|string|unique:students,prem_number,' . $student->id,
            'admission_number' => 'nullable|string',
            'admission_date' => 'nullable|date',
            'current_level' => 'nullable|integer',
            'current_class' => 'nullable|string|max:255',
            'status' => 'required|string',
            'parent_name' => 'nullable|string|max:255',
            'parent_phone' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $validated['full_name'] = trim($validated['first_name'] . ' ' . ($validated['middle_name'] ?? '') . ' ' . $validated['last_name']);
        
        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
