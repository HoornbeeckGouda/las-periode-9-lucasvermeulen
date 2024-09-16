<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectGrade extends Model
{
    use HasFactory;
    protected $guarded = [];  


    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
