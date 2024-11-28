<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // For Authentication
use Illuminate\Notifications\Notifiable; // Optional, if you plan to use notifications
use Illuminate\Support\Facades\Hash; // For password hashing

class Instructor extends Authenticatable
{
    use HasFactory, Notifiable;

    // Fillable attributes
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'dob',
        'course_id',
        'password', // Include password field to be fillable
    ];

    // Define the relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Set the instructor's password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value); // Hash the password
    }
}
