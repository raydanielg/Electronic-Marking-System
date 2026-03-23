<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\School;
use Illuminate\Http\Request;

class StudentController extends Controller
{
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
