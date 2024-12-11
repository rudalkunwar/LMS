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
       
    }
}
