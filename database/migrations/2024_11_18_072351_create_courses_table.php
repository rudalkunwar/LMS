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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Course title
            $table->integer('lecture_hours'); // Column to track lecture hours (integer format)
            $table->text('description'); // Course description
            $table->string('image')->nullable(); // URL for the course image (optional)
            $table->foreignId('instructor_id')->constrained('instructors')->onDelete('cascade'); // Foreign key to instructors table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
