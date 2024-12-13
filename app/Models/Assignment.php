<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'course_id',
        'instructor_id',
        'title',
        'description',
        'due_date',
        'total_marks',
        'file_path',
    ];
}
