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
        return view('admin.instructors.index', ['instructors' => Instructor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.instructors.create', ['courses' => Course::all()]);
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
            'photo' => 'nullable|image',
        ]);

        $instructor = Instructor::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'course_id' => $validated['course_id'],
            'password' => $validated['password'], // Model will handle hashing
            'photo' => $request->hasFile('photo') ? $request->file('photo')->store('instructor_photos', 'public') : null,
        ]);

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor created successfully!');
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
        return view('admin.instructors.edit', ['instructor' => $instructor, 'courses' => Course::all()]);
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
            'photo' => 'nullable|image',
        ]);

        $instructor->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'course_id' => $validated['course_id'],
            'photo' => $request->hasFile('photo') 
                ? $request->file('photo')->store('instructor_photos', 'public') 
                : $instructor->photo,
        ]);

        if ($request->hasFile('photo') && $instructor->wasChanged('photo')) {
            // Delete old photo if it was replaced
            Storage::disk('public')->delete($instructor->getOriginal('photo'));
        }

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        // Delete photo if exists
        if ($instructor->photo) {
            Storage::disk('public')->delete($instructor->photo);
        }

        $instructor->delete();

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor deleted successfully!');
    }
}
