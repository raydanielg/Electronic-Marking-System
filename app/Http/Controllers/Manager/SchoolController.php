<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Region;
use App\Models\District;
use App\Models\SchoolCategory;
use App\Models\SchoolType;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::latest()->paginate(10);
        return view('manager.schools.index', compact('schools'));
    }

    public function create()
    {
        $regions = Region::orderBy('name')->get();
        $categories = SchoolCategory::orderBy('order')->get();
        $types = SchoolType::orderBy('order')->get();
        return view('manager.schools.create', compact('regions', 'categories', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'registration_number' => 'required|string|unique:schools',
            'category' => 'required|string',
            'type' => 'required|string',
            'region' => 'required|string',
            'district' => 'required|string',
        ]);

        School::create($request->all());

        return redirect()->route('schools.index')->with('success', 'School added successfully.');
    }

    public function edit(School $school)
    {
        $regions = Region::orderBy('name')->get();
        $categories = SchoolCategory::orderBy('order')->get();
        $types = SchoolType::orderBy('order')->get();
        
        // Get district ID from school's district name
        $district = District::where('name', $school->district)->first();
        $districts = $district ? District::where('region_id', $district->region_id)->get() : collect([]);
        
        return view('manager.schools.edit', compact('school', 'regions', 'categories', 'types', 'districts'));
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'registration_number' => 'required|string|unique:schools,registration_number,' . $school->id,
            'category' => 'required|string',
            'type' => 'required|string',
            'region' => 'required|string',
            'district' => 'required|string',
        ]);

        $school->update($request->all());

        return redirect()->route('schools.index')->with('success', 'School updated successfully.');
    }

    public function destroy(School $school)
    {
        $school->delete();
        return redirect()->route('schools.index')->with('success', 'School deleted successfully.');
    }

    // Import functionality
    public function importPage()
    {
        return view('manager.schools.import');
    }

    public function preview(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:xlsx,xls|max:10240'
        ]);

        try {
            $file = $request->file('import_file');
            $spreadsheet = IOFactory::load($file->getPathname());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Remove header row
            array_shift($rows);

            $data = [];
            $categories = SchoolCategory::pluck('name')->toArray();
            $types = SchoolType::pluck('name')->toArray();
            $regions = Region::pluck('name')->toArray();

            foreach ($rows as $index => $row) {
                if (empty($row[0])) continue; // Skip empty rows

                $rowData = [
                    'name' => $row[0] ?? null,
                    'registration_number' => $row[1] ?? null,
                    'category' => $row[2] ?? null,
                    'type' => $row[3] ?? null,
                    'region' => $row[4] ?? null,
                    'district' => $row[5] ?? null,
                    'ward' => $row[6] ?? null,
                    'address' => $row[7] ?? null,
                    'email' => $row[8] ?? null,
                    'phone' => $row[9] ?? null,
                    'headmaster_name' => $row[10] ?? null,
                ];

                // Validate
                $status = 'valid';
                $message = '';

                if (empty($rowData['name'])) {
                    $status = 'invalid';
                    $message = 'Name required';
                } elseif (empty($rowData['registration_number'])) {
                    $status = 'invalid';
                    $message = 'Reg. No. required';
                } elseif (School::where('registration_number', $rowData['registration_number'])->exists()) {
                    $status = 'duplicate';
                    $message = 'Duplicate Reg. No.';
                } elseif (!in_array($rowData['category'], $categories)) {
                    $status = 'invalid';
                    $message = 'Invalid category';
                } elseif (!in_array($rowData['type'], $types)) {
                    $status = 'invalid';
                    $message = 'Invalid type';
                } elseif (!in_array($rowData['region'], $regions)) {
                    $status = 'invalid';
                    $message = 'Invalid region';
                } else {
                    // Check district
                    $region = Region::where('name', $rowData['region'])->first();
                    if ($region && !District::where('name', $rowData['district'])->where('region_id', $region->id)->exists()) {
                        $status = 'invalid';
                        $message = 'Invalid district';
                    }
                }

                $rowData['status'] = $status;
                $rowData['message'] = $message;
                $data[] = $rowData;

                if (count($data) >= 500) break; // Limit to 500 records
            }

            return response()->json([
                'success' => true,
                'data' => $data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error reading file: ' . $e->getMessage()
            ]);
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'schools' => 'required|array',
            'schools.*.name' => 'required|string',
            'schools.*.registration_number' => 'required|string',
        ]);

        $imported = 0;
        $skipped = 0;

        foreach ($request->schools as $schoolData) {
            if (School::where('registration_number', $schoolData['registration_number'])->exists()) {
                $skipped++;
                continue;
            }

            School::create([
                'name' => $schoolData['name'],
                'registration_number' => $schoolData['registration_number'],
                'category' => $schoolData['category'] ?? 'Primary',
                'type' => $schoolData['type'] ?? 'Government',
                'region' => $schoolData['region'] ?? '',
                'district' => $schoolData['district'] ?? '',
                'ward' => $schoolData['ward'] ?? null,
                'address' => $schoolData['address'] ?? null,
                'email' => $schoolData['email'] ?? null,
                'phone' => $schoolData['phone'] ?? null,
                'headmaster_name' => $schoolData['headmaster_name'] ?? null,
            ]);
            $imported++;
        }

        return response()->json([
            'success' => true,
            'message' => "Import complete! {$imported} schools imported, {$skipped} duplicates skipped."
        ]);
    }

    public function downloadTemplate()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Headers
        $headers = [
            'A1' => 'School Name',
            'B1' => 'Registration Number',
            'C1' => 'Category',
            'D1' => 'Type',
            'E1' => 'Region',
            'F1' => 'District',
            'G1' => 'Ward',
            'H1' => 'Address',
            'I1' => 'Email',
            'J1' => 'Phone',
            'K1' => 'Headmaster Name',
        ];

        foreach ($headers as $cell => $value) {
            $sheet->setCellValue($cell, $value);
            $sheet->getStyle($cell)->getFont()->setBold(true);
        }

        // Sample data
        $sheet->setCellValue('A2', 'Sample Primary School');
        $sheet->setCellValue('B2', 'S.1234/567');
        $sheet->setCellValue('C2', 'Primary');
        $sheet->setCellValue('D2', 'Government');
        $sheet->setCellValue('E2', 'Dar es Salaam');
        $sheet->setCellValue('F2', 'Ilala');
        $sheet->setCellValue('G2', 'Kivukoni');
        $sheet->setCellValue('H2', 'Kivukoni Street');
        $sheet->setCellValue('I2', 'school@example.com');
        $sheet->setCellValue('J2', '+255 123 456 789');
        $sheet->setCellValue('K2', 'John Doe');

        // Auto-size columns
        foreach (range('A', 'K') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $filename = 'school_import_template.xlsx';
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function getDistricts($regionId)
    {
        $districts = District::where('region_id', $regionId)->orderBy('name')->get(['id', 'name']);
        return response()->json($districts);
    }

    public function checkDuplicate(Request $request)
    {
        $exists = School::where('registration_number', $request->reg)->exists();
        return response()->json(['duplicate' => $exists]);
    }

    public function details(School $school)
    {
        return response()->json([
            'success' => true,
            'school' => $school
        ]);
    }
}
