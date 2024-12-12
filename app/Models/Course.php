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

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function student()
    {
        return $this->belongsToMany(Student::class);
    }
}
