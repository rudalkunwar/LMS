<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch assignments for the logged-in instructor with eager loading to optimize query
        $assignments = Assignment::where('instructor_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('instructor.assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructor = Instructor::find(Auth::id());
        $course = $instructor->course; // Get courses taught by the logged-in instructor
        return view('instructor.assignments.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date|after:today', // Ensure due date is in the future
            'total_marks' => 'required|integer|min:1', // Ensure positive marks
            'file_path' => 'nullable|file|mimes:pdf,docx,doc|max:2048',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('assignments', 'public');
        }

        // Create the assignment with additional data
        $assignment = Assignment::create([
            'course_id' => $validated['course_id'],
            'instructor_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
            'total_marks' => $validated['total_marks'],
            'file_path' => $filePath
        ]);

        return redirect()->route('instructor.assignments.index')
            ->with('success', 'Assignment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment)
    {
        return view('instructor.assignments.show', compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment)
    {

        $courses = Course::where('instructor_id', Auth::id())->get();
        return view('instructor.assignments.edit', compact('assignment', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date|after:today', // Ensure due date is in the future
            'total_marks' => 'required|integer|min:1', // Ensure positive marks
            'file_path' => 'nullable|file|mimes:pdf,docx,doc|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('file_path')) {
            // Delete old file if exists
            if ($assignment->file_path) {
                Storage::disk('public')->delete($assignment->file_path);
            }

            // Store new file
            $validated['file_path'] = $request->file('file_path')->store('assignments', 'public');
        } else {
            // Keep existing file path if no new file is uploaded
            $validated['file_path'] = $assignment->file_path;
        }

        // Update the assignment
        $assignment->update($validated);

        return redirect()->route('instructor.assignments.index')
            ->with('success', 'Assignment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        // Delete file if exists
        if ($assignment->file_path) {
            Storage::disk('public')->delete($assignment->file_path);
        }

        // Delete the assignment
        $assignment->delete();

        return redirect()->route('instructor.assignments.index')
            ->with('success', 'Assignment deleted successfully!');
    }
}
