<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    /** @use HasFactory<\Database\Factories\InstructorFactory> */
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'department',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
