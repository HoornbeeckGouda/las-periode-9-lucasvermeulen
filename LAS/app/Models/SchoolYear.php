<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class SchoolYear extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    public function careers(): HasMany
    {
        return $this->hasMany(career::class);
    }
}
