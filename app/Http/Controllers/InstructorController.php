<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::all(); // Fetch all instructors
        return view('admin.instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all(); // Fetch all available courses
        return view('admin.instructors.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email',
            'phone_number' => 'nullable|string|max:15',
            'course_id' => 'required|exists:courses,id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $instructor = new Instructor();
        $instructor->name = $validated['name'];
        $instructor->email = $validated['email'];
        $instructor->phone_number = $validated['phone_number'] ?? null;
        $instructor->course_id = $validated['course_id'];
        $instructor->password = bcrypt($validated['password']); // Encrypt password

        // Handle file upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('instructor_photos', 'public');
            $instructor->photo = $photoPath;
        }
        $instructor->save();



        return redirect()->route('instructors.index')->with('success', 'Instructor created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        return view('admin.instructors.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        $courses = Course::all();
        return view('admin.instructors.edit', compact('instructor', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email,' . $instructor->id,
            'phone_number' => 'nullable|string|max:15',
            'course_id' => 'required|exists:courses,id',
        ]);

        $instructor->name = $validated['name'];
        $instructor->email = $validated['email'];
        $instructor->phone_number = $validated['phone_number'] ?? null;
        $instructor->course_id = $validated['course_id'];
        // Handle file upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($instructor->photo) {
                Storage::disk('public')->delete($instructor->photo);
            }

            $photoPath = $request->file('photo')->store('instructor_photos', 'public');
            $instructor->photo = $photoPath;
        }

        $instructor->save();
        return redirect()->route('instructors.index')->with('success', 'Instructor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $Instructor)
    {
        // Delete photo if exists
        if ($Instructor->photo) {
            Storage::disk('public')->delete($Instructor->photo);
        }

        $Instructor->delete();

        return redirect()->route('instructors.index')->with('success', 'Instructor deleted successfully!');
    }
}
