<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Career extends Model
{
    use HasFactory;
    

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
    public function school_year(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class);
    }
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
    public function courseSubject(){
        return $this->hasMany(courseSubject::class);
    }
    public function subjectGrade(){
        return $this->hasMany(SubjectGrade::class);
    }
}
