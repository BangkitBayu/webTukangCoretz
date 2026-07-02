<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'occupation',
        'feedback',
        'rating',
        'is_visible'
    ];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', 1);
    }
}
