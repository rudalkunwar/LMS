<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 'instructor_id', 'title', 'description', 'lesson_type', 'content_url', 'order'
    ];

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relationship with Instructor
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
}
