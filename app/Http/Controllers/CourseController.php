<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'code' => 'required|unique:courses,code|max:50',
            'title' => 'required|max:255',
            'description' => 'required',
            'thumbnail' => 'nullable|image|max:2048', // Optional image, max 2MB
            'status' => 'required|in:active,inactive'
        ]);

        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('course_thumbnails', 'public');
            $validatedData['thumbnail'] = $thumbnailPath;
        }

        // Create the course
        $course = Course::create($validatedData);

        // Redirect with success message
        return redirect()->route('admin.courses.index')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // Validate the request
        $validatedData = $request->validate([
            'code' => 'required|unique:courses,code,' . $course->id . '|max:50',
            'title' => 'required|max:255',
            'description' => 'required',
            'thumbnail' => 'nullable|image|max:2048', // Optional image, max 2MB
            'status' => 'required|in:active,inactive'
        ]);

        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($course->thumbnail) {
                Storage::disk('public')->delete($course->thumbnail);
            }

            $thumbnailPath = $request->file('thumbnail')->store('course_thumbnails', 'public');
            $validatedData['thumbnail'] = $thumbnailPath;
        }

        // Update the course
        $course->update($validatedData);

        // Redirect with success message
        return redirect()->route('admin.courses.index')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // Delete thumbnail if exists
        if ($course->thumbnail) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        // Delete the course
        $course->delete();

        // Redirect with success message
        return redirect()->route('admin.courses.index')
            ->with('success', 'Course deleted successfully.');
    }



    public function instructorCourses()
    {
        $instructor = Auth::user(); // Get the currently authenticated user
        $courses = Course::where('instructor_id', $instructor->id)->get(); // Query courses by instructor ID
        return view('instructor.courses.index', compact('courses')); // Pass courses to the view
    }
}
