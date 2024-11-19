<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'lecture_hours',
        'description',
        'image',
        'instructor_id',
    ];
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
}
