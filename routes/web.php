<?php

use App\Http\Controllers\AdminAuthenticationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorAuthenticationController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentAssignmentsController;
use App\Http\Controllers\StudentAuthenticationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (unauthenticated admins)
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('login', [AdminAuthenticationController::class, 'showLoginForm'])
            ->name('login');
        Route::post('login', [AdminAuthenticationController::class, 'login'])
            ->name('login.submit');
    });

    // Authenticated admin routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::post('logout', [AdminAuthenticationController::class, 'logout'])
            ->name('logout');
        Route::get('dashboard', [AdminAuthenticationController::class, 'dashboard'])
            ->name('dashboard');

        // Resource Routes with additional custom routes
        Route::resources([
            'students' => StudentController::class,
            'instructors' => InstructorController::class,
            'courses' => CourseController::class
        ]);

        // Additional admin-specific routes can be added here
        Route::get('profile', [AdminAuthenticationController::class, 'profile'])
            ->name('profile');
    });
});

// Student Routes
Route::prefix('student')->name('student.')->group(function () {
    // Guest routes
    Route::middleware(['guest:student'])->group(function () {
        Route::get('login', [StudentAuthenticationController::class, 'showLoginForm'])
            ->name('login');
        Route::post('login', [StudentAuthenticationController::class, 'login'])
            ->name('login.submit');

        // Registration route (optional)
        Route::get('register', [StudentAuthenticationController::class, 'showRegistrationForm'])
            ->name('register');
        Route::post('register', [StudentAuthenticationController::class, 'register'])
            ->name('register.submit');
    });

    // Authenticated student routes
    Route::middleware(['auth:student'])->group(function () {
        Route::post('logout', [StudentAuthenticationController::class, 'logout'])
            ->name('logout');
        Route::get('dashboard', [StudentAuthenticationController::class, 'dashboard'])
            ->name('dashboard');

        // Additional student-specific routes
        Route::get('courses', [StudentController::class, 'courses'])
            ->name('courses');

        Route::resources([
            'assignments' => StudentAssignmentsController::class,

        ]);
        Route::get('profile', [StudentController::class, 'profile'])
            ->name('profile');
    });
});

// Instructor Routes
Route::prefix('instructor')->name('instructor.')->group(function () {
    // Guest routes
    Route::middleware(['guest:instructor'])->group(function () {
        Route::get('login', [InstructorAuthenticationController::class, 'showLoginForm'])
            ->name('login');
        Route::post('login', [InstructorAuthenticationController::class, 'login'])
            ->name('login.submit');
    });

    // Authenticated instructor routes
    Route::middleware(['auth:instructor'])->group(function () {
        Route::post('logout', [InstructorAuthenticationController::class, 'logout'])
            ->name('logout');
        Route::get('dashboard', [InstructorAuthenticationController::class, 'dashboard'])
            ->name('dashboard');

        // Additional instructor-specific routes
        Route::get('courses', [InstructorController::class, 'courses'])
            ->name('courses');
        Route::get('profile', [InstructorController::class, 'profile'])
            ->name('profile');
    });
});

// Optional: Catch-all route for 404
Route::fallback(function () {
    return view('errors.404');
});
