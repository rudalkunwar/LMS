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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('course_id')->constrained()->onDelete('cascade');  // Foreign key to courses table
            $table->foreignId('instructor_id')->constrained('instructors')->onDelete('cascade');  // Foreign key to instructors table
            $table->string('title');  // Lesson title
            $table->text('description');  // Lesson description
            $table->enum('lesson_type', ['video', 'document', 'quiz', 'text']);  // Type of lesson content
            $table->string('content_url')->nullable();  // URL for external content (e.g., video link, file link)
            $table->integer('order')->default(0);  // The order in which the lesson appears in the course
            $table->timestamps();  // Created_at and updated_at timestamps
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
