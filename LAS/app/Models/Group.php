<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Group extends Model
{
    use HasFactory;

    public function course(): BelongsTo
    {
        return $this->BelongsTo(Course::class);
    }
    public function schoolYear(): BelongsTo
    {
        return $this->BelongsTo(SchoolYear::class);
    }

    public function careers(): HasMany
    {
        return $this->hasMany(career::class);
    }
}
