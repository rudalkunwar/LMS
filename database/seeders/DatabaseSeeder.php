<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
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

        // Creating the admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone_number' => null,  // Optional field, can be left as null
            'address' => null,       // Optional field, can be left as null
            'dob' => null,           // Optional field, can be left as null
            'photo' => null,         // Optional field, can be left as null
            'role' => 'admin',       // Setting the role as 'admin'
            'is_active' => true,     // User is active by default
            'email_verified_at' => now(),  // Email is verified by default
            'password' => Hash::make('11111111'),  // Securely hashed password
        ]);

        // Creating the student user
        User::create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'phone_number' => null,  // Optional field, can be left as null
            'address' => null,       // Optional field, can be left as null
            'dob' => null,           // Optional field, can be left as null
            'photo' => null,         // Optional field, can be left as null
            'role' => 'student',     // Setting the role as 'student'
            'is_active' => true,     // User is active by default
            'email_verified_at' => now(),  // Email is verified by default
            'password' => Hash::make('11111111'),  // Securely hashed password
        ]);

        // Creating the instructor user
        User::create([
            'name' => 'Instructor User',
            'email' => 'instructor@example.com',
            'phone_number' => null,  // Optional field, can be left as null
            'address' => null,       // Optional field, can be left as null
            'dob' => null,           // Optional field, can be left as null
            'photo' => null,         // Optional field, can be left as null
            'role' => 'instructor',  // Setting the role as 'instructor'
            'is_active' => true,     // User is active by default
            'email_verified_at' => now(),  // Email is verified by default
            'password' => Hash::make('11111111'),  // Securely hashed password
        ]);

        // Sample courses data
        $courses = [
            [
                'code' => 'CS101',
                'title' => 'Introduction to Programming',
                'description' => 'A beginner course in programming fundamentals',
                'thumbnail' => 'https://via.placeholder.com/150',
                'status' => 'active',
            ],
            [
                'code' => 'WD200',
                'title' => 'Web Development Basics',
                'description' => 'Learn HTML, CSS, and JavaScript for web development',
                'thumbnail' => 'https://via.placeholder.com/150',
                'status' => 'active',
            ],
            [
                'code' => 'JS300',
                'title' => 'Advanced JavaScript',
                'description' => 'Deep dive into JavaScript concepts and frameworks',
                'thumbnail' => 'https://via.placeholder.com/150',
                'status' => 'inactive',
            ],
            [
                'code' => 'DB400',
                'title' => 'Database Management Systems',
                'description' => 'Learn how to design, implement, and manage databases',
                'thumbnail' => 'https://via.placeholder.com/150',
                'status' => 'active',
            ],
            [
                'code' => 'REACT500',
                'title' => 'React for Frontend Development',
                'description' => 'Build dynamic web applications with React',
                'thumbnail' => 'https://via.placeholder.com/150',
                'status' => 'active',
            ],
            [
                'code' => 'PHP600',
                'title' => 'PHP and Laravel',
                'description' => 'Master backend web development using PHP and Laravel framework',
                'thumbnail' => 'https://via.placeholder.com/150',
                'status' => 'inactive',
            ],
            [
                'code' => 'MOBILE700',
                'title' => 'Mobile App Development',
                'description' => 'Learn to build mobile applications for iOS and Android',
                'thumbnail' => 'https://via.placeholder.com/150',
                'status' => 'active',
            ],
            [
                'code' => 'DSA800',
                'title' => 'Data Structures and Algorithms',
                'description' => 'Understand essential data structures and algorithms',
                'thumbnail' => 'https://via.placeholder.com/150',
                'status' => 'active',
            ],
        ];

        // Insert sample data into the courses table
        foreach ($courses as $course) {
            Course::create([
                'code' => $course['code'],
                'title' => $course['title'],
                'description' => $course['description'],
                'thumbnail' => $course['thumbnail'],
                'status' => $course['status'],
            ]);
        }
    }
}
