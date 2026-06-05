<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'thumbnail',
        'start_date',
        'end_date',
        'is_published',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryProject::class);
    }
}
