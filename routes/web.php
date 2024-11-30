<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorAuthenticationController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentAuthenticationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('login');
});

// Admiin Routes
// Group for 'admin' routes
Route::prefix('admin')->name('admin.')->group(function () {

    // For guests (not logged in as admin)
    Route::middleware('guest')->group(function () {
        // Admin login form and login POST request
        Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthenticationController::class, 'login']);
    });

    // For authenticated admins
    Route::middleware('auth')->group(function () {
        // Admin logout
        Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

        // Admin dashboard (for authenticated admins only)
        Route::get('/dashboard', function () {
            return view('admin.dashboard'); 
        })->name('dashboard');
    });
});

// Student Routes
Route::prefix('student')->name('student.')->group(function () {
    Route::middleware('guest:student')->group(function () {
        Route::get('login', [StudentAuthenticationController::class, 'showLoginForm'])->name('login');
        Route::post('login', [StudentAuthenticationController::class, 'login']);
    });
    Route::middleware('auth:student')->group(function () {
        Route::post('logout', [StudentAuthenticationController::class, 'logout'])->name('logout');
        Route::get('dashboard', [StudentAuthenticationController::class, 'dashboard'])->name('dashboard');
    });
});

// Instructor Routes
Route::prefix('instructor')->name('instructor.')->group(function () {
    Route::middleware('guest:instructor')->group(function () {
        Route::get('login', [InstructorAuthenticationController::class, 'showLoginForm'])->name('login');
        Route::post('login', [InstructorAuthenticationController::class, 'login']);
    });
    Route::middleware('auth:instructor')->group(function () {
        Route::post('logout', [InstructorAuthenticationController::class, 'logout'])->name('logout');
        Route::get('dashboard', [InstructorAuthenticationController::class, 'dashboard'])->name('dashboard');
    });
});

// Admin Routes (for managing students)
// Route::prefix('admin')->name('admin.')->group(function () {
// Resource Routes for Students
Route::resource('students', StudentController::class);
// Resource Routes for Instructors
Route::resource('instructors', InstructorController::class);
// Resource Routes for Courses
Route::resource('courses', CourseController::class);
// });
