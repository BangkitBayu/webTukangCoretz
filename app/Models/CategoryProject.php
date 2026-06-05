<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryProject extends Model
{
    protected $fillable = [
        'name'
    ];

    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
