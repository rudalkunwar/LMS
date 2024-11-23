<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display a listing of students
    public function index()
    {
        $students = Student::with('course')->get();
        return view('admin.students.index', compact('students'));
    }

    // Show the form to create a new student
    public function create()
    {
        $courses = Course::all(); // Fetch courses for the dropdown
        return view('admin.students.create', compact('courses'));
    }

    // Store a new student in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'course_id' => 'required|exists:courses,id',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    // Show the form to edit an existing student
    public function edit(Student $student)
    {
        $courses = Course::all(); // Fetch courses for the dropdown
        return view('admin.students.edit', compact('student', 'courses'));
    }

    // Update an existing student in the database
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Delete a student from the database
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
