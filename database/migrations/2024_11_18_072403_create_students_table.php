<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // Student's first name
            $table->string('last_name'); // Student's last name
            $table->string('email')->unique(); // Student's email (must be unique)
            $table->string('phone_number')->nullable(); // Optional phone number
            $table->string('address')->nullable(); // Optional address
            $table->date('dob')->nullable(); // Date of birth
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); // Foreign key to instructors table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
