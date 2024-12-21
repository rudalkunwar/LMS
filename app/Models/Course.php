<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;
    protected $fillable = [
        'code',
        'title',
        'description',
        'instructor_id',
        'thumbnail',
        'status'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }
}
