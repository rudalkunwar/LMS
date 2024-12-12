<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.students.index', ['students' => Student::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create', ['courses' => Course::all()]);
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
            'photo' => 'nullable|image', // You can validate photo type here
        ]);

        $student = Student::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'dob' => $validated['dob'],
            'course_id' => $validated['course_id'],
            'password' => $validated['password'], // Model will hash this automatically
            'photo' => $request->hasFile('photo') ? $request->file('photo')->store('student_photos', 'public') : null,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Student created successfully!');
    }

    /**
     * Show the specified resource.
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
        return view('admin.students.edit', ['student' => $student, 'courses' => Course::all()]);
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
            'photo' => 'nullable|image',
        ]);

        $student->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'dob' => $validated['dob'],
            'course_id' => $validated['course_id'],
            'photo' => $request->hasFile('photo') ? $request->file('photo')->store('student_photos', 'public') : $student->photo,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully!');
    }

    public function courses()
    {
        return view('student.courses.index');
    }

    public function instructorStudents()
    {
        $instructor = Auth::user(); // Get the authenticated instructor
        $course = $instructor->course;
        $students = Student::where('course_id', $course->id)->get();
        return view('instructor.students.index', compact('students'));
    }
    public function instructorStudentsShow(Student $student)
    {
        return view('instructor.students.show', compact('student'));
    }
}
