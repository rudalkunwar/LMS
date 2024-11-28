<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import Authenticatable
use Illuminate\Notifications\Notifiable; // Optional if you are using notifications
use Illuminate\Support\Facades\Hash; // For hashing passwords

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'dob',
        'course_id',
        'password', // Ensure password is fillable
    ];

    // Automatically cast dob to a date
    protected $casts = [
        'dob' => 'date',
    ];

    // Define the relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Set the student's password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value); // Hash password before saving
    }
}
