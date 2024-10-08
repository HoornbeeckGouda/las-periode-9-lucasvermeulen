<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Student extends Model
{
    use HasFactory;
    protected $guarded = []; 


    public function careers(): HasMany
    {
        return $this->hasMany(career::class);
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
