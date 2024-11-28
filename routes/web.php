<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CourseController;
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

Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/register', [AuthenticationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

// Student Routes
Route::prefix('student')->name('student.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [StudentAuthenticationController::class, 'showLoginForm'])->name('login');
        Route::post('login', [StudentAuthenticationController::class, 'login']);
    });
    Route::middleware('auth')->group(function () {
        Route::post('logout', [StudentAuthenticationController::class, 'logout'])->name('logout');
        Route::get('dashboard', [StudentAuthenticationController::class, 'dashboard'])->name('dashboard');
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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
