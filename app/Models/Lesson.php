<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'content',
        'order',
        'video_url',
        'document_url'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
