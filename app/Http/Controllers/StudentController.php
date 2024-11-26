<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all(); // Fetch all students
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all(); // Fetch all available courses
        return view('admin.students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'course_id' => 'required|exists:courses,id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $student = new Student();
        $student->name = $validated['name'];
        $student->email = $validated['email'];
        $student->phone_number = $validated['phone_number'] ?? null;
        $student->address = $validated['address'] ?? null;
        $student->dob = $validated['dob'] ?? null;
        $student->course_id = $validated['course_id'];
        $student->password = bcrypt($validated['password']); // Encrypt password

        // Handle file upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('user_photos', 'public');
            $student->photo = $photoPath;
        }
        $student->save();



        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('admin.students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student->name = $validated['name'];
        $student->email = $validated['email'];
        $student->phone_number = $validated['phone_number'] ?? null;
        $student->address = $validated['address'] ?? null;
        $student->dob = $validated['dob'] ?? null;
        $student->course_id = $validated['course_id'];
        // Handle file upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }

            $photoPath = $request->file('photo')->store('student_photos', 'public');
            $student->photo = $photoPath;
        }

        $student->save();
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // Delete photo if exists
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
