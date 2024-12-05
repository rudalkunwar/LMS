<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Student;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Admin::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('11111111'),
        ]);

        Course::factory()->create([
            'code' => 'CSE101',
            'title' => 'Introduction to Computer Science',
            'description' => 'A foundational course in computer science.',
            'thumbnail' => 'cse101.jpg', // Example path to an image
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Student::factory()->create([
            'name' => 'Student',
            'email' => 'student@example.com',
            'phone_number' => '1234567890',
            'address' => '123 Elm Street, Springfield',
            'dob' => '2000-01-01',
            'photo' => 'default.png',
            'course_id' => 1, // Replace with a valid course_id
            'password' => Hash::make('11111111'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Instructor::factory()->create([
            'name' => 'Instructor',
            'email' => 'instructor@example.com',
            'phone_number' => '1234567890',
            'photo' => 'john_doe.jpg', // Example path to an image
            'course_id' => 1, // Ensure this matches an existing `id` in the `courses` table
            'password' => Hash::make('11111111'), // Securely hash passwords
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
