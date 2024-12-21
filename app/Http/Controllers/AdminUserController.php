<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $instructors = User::where('role', 'instructor')->get();
        $students = User::where('role', 'student')->get();

        return view('admin.users.index', compact('instructors', 'students'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        // Pass available courses and roles to the create view
        return view('admin.users.create', [
            'courses' => Course::all(),
            'roles' => ['student', 'instructor'], // Add roles options
        ]);
    }

    /**
     * Store a newly created user in storage.
     */
    // Store a newly created user in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL', // Fixed unique validation for soft deletes
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'courses' => 'required|array', // Validate that courses is an array
            'courses.*' => 'exists:courses,id', // Validate that each course ID exists
            'role' => 'required|in:student,instructor', // Validate role
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'nullable|image', // Ensure that the photo is an image
        ]);

        // Create the user with the selected role
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'dob' => $validated['dob'],
            'role' => $validated['role'], // Store the selected role
            'password' => Hash::make($validated['password']), // Hash password before saving
            'photo' => $request->hasFile('photo') ? $request->file('photo')->store('user_photos', 'public') : null,
        ]);

        // Attach multiple courses to the user via the pivot table
        $user->courses()->sync($validated['courses']); // Sync the courses

        return redirect()->route('admin.users.index')->with('success', ucfirst($validated['role']) . ' created successfully!');
    }
    /**
     * Show the specified user.
     */
    public function show(User $user)
    {
        // Load courses associated with the user, if any
        $courses = $user->courses;  // Assuming a user has many courses

        return view('admin.users.show', compact('user', 'courses'));
    }


    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        // Pass user, courses, and roles to the edit view
        return view('admin.users.edit', [
            'user' => $user,
            'courses' => Course::all(),
            'roles' => ['student', 'instructor'], // Add roles options
        ]);
    }

    /**
     * Update the specified user in storage.
     */
    // Update the specified user in storage.
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Ignore unique check for this user
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'courses' => 'required|array', // Validate that courses is an array
            'courses.*' => 'exists:courses,id', // Validate that each course ID exists
            'role' => 'required|in:student,instructor', // Validate role
            'photo' => 'nullable|image', // Ensure that the photo is an image
        ]);

        // Update user details
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'dob' => $validated['dob'],
            'role' => $validated['role'], // Update the role
            'photo' => $request->hasFile('photo') ? $request->file('photo')->store('user_photos', 'public') : $user->photo,
        ]);

        // Sync the courses with the user
        $user->courses()->sync($validated['courses']); // Sync the courses

        return redirect()->route('admin.users.index')->with('success', ucfirst($validated['role']) . ' updated successfully!');
    }


    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        // If the user has a photo, delete it
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->forceDelete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
