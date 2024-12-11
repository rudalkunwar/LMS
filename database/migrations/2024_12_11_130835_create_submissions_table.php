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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('assignment_id')->constrained('assignments')->onDelete('cascade');  // Foreign key to assignments table
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');  // Foreign key to users table (students)
            $table->string('file_path')->nullable();  // Path to the file submitted (if applicable)
            $table->datetime('submitted_at')->nullable();  // The submission date/time
            $table->integer('grade')->nullable();  // Grade for the submission (nullable until graded)
            $table->text('feedback')->nullable();  // Instructor's feedback (nullable until graded)
            $table->enum('status', ['pending', 'graded'])->default('pending');  // Status of the submission
            $table->timestamps();  // Created_at and updated_at timestamps
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
