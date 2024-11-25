<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Display the list of courses
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    // Show the form to create a new course
    public function create()
    {
        $instructors = Instructor::all(); // Fetch instructors for the dropdown
        return view('admin.courses.create', compact('instructors'));
    }

    // Store a new course in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:courses',
            'title' => 'required|string|max:255|unique:courses,title',
            'lecture_hours' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Handle the image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('course_images', 'public');
            $validated['image'] = $imagePath;
        }

        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    // Show the form to edit an existing course
    public function edit(Course $course)
    {
        $instructors = Instructor::all(); // Fetch instructors for the dropdown
        return view('admin.courses.edit', compact('course', 'instructors'));
    }

    // Update an existing course in the database
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'code' => 'required|unique:courses',
            'title' => 'required|string|max:255|unique:courses,title',
            'lecture_hours' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Handle the image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('course_images', 'public');
            $validated['image'] = $imagePath;
        }

        $course->update($validated);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    // Delete a course from the database
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
