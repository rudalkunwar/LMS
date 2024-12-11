<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignments = Assignment::latest()->paginate(10);
        return view('instructor.assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructor.assignments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'code' => 'required|unique:assignments,code|max:50',
            'title' => 'required|max:255',
            'description' => 'required',
            'thumbnail' => 'nullable|image|max:2048', // Optional image, max 2MB
            'status' => 'required|in:active,inactive'
        ]);

        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('assignment_thumbnails', 'public');
            $validatedData['thumbnail'] = $thumbnailPath;
        }

        // Create the assignment
        $assignment = Assignment::create($validatedData);

        // Redirect with success message
        return redirect()->route('instructor.assignments.index')
            ->with('success', 'assignment created successfully.');
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
        return view('instructor.assignments.edit', compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $assignment)
    {
        // Validate the request
        $validatedData = $request->validate([
            'code' => 'required|unique:assignments,code,' . $assignment->id . '|max:50',
            'title' => 'required|max:255',
            'description' => 'required',
            'thumbnail' => 'nullable|image|max:2048', // Optional image, max 2MB
            'status' => 'required|in:active,inactive'
        ]);

        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($assignment->thumbnail) {
                Storage::disk('public')->delete($assignment->thumbnail);
            }

            $thumbnailPath = $request->file('thumbnail')->store('assignment_thumbnails', 'public');
            $validatedData['thumbnail'] = $thumbnailPath;
        }

        // Update the assignment
        $assignment->update($validatedData);

        // Redirect with success message
        return redirect()->route('instructor.assignments.index')
            ->with('success', 'assignment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(assignment $assignment)
    {
        // Delete thumbnail if exists
        if ($assignment->thumbnail) {
            Storage::disk('public')->delete($assignment->thumbnail);
        }

        // Delete the assignment
        $assignment->delete();

        // Redirect with success message
        return redirect()->route('instructor.assignments.index')
            ->with('success', 'assignment deleted successfully.');
    }
}
