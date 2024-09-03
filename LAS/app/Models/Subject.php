<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function courseSubject()
    {
        return $this->hasMany(CourseSubject::class);
    }

    public function subjectGrade()
    {
        return $this->hasMany(SubjectGrade::class);
    }
}
