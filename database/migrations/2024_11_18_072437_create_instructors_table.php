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
            $table->string('first_name'); // Instructor's first name
            $table->string('last_name'); // Instructor's last name
            $table->string('email')->unique(); // Instructor's email (must be unique)
            $table->string('phone_number')->nullable(); // Optional phone number
            $table->string('department')->nullable(); // Optional department name
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
