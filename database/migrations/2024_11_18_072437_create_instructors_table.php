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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Instructor's  name
            $table->string('email')->unique(); // Instructor's email (must be unique)
            $table->string('phone_number')->nullable(); // Optional phone number
            $table->string('photo')->nullable();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); // Foreign key to instructors table
            $table->string('password');
            $table->rememberToken(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
