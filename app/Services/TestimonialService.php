<?php

namespace App\Services;

use App\Exceptions\TestimonialLimitExceededException;
use App\Models\Testimonial;
use Exception;

// Implementasi logika bisnis untuk testimonial
class TestimonialService
{
    private const MAX_VISIBLE_TESTIMONIALS = 25;

    public function store(array $data): Testimonial
    {

        if ($data['is_visible'] == 1 && $this->hasReachedVisibleLimit()) {
            throw new TestimonialLimitExceededException();
        }

        return Testimonial::create([
            'name' => $data['name'],
            'occupation' => $data['occupation'],
            'feedback' => $data['feedback'],
            'rating' => $data['rating'],
            'is_visible' => $data['is_visible']
        ]);
    }

    // Mengembalikan nilai true or false untuk mengecek apakah testimonial terlihat melebihi batas
    public function hasReachedVisibleLimit(): bool
    {
        return Testimonial::visible()->count() >= self::MAX_VISIBLE_TESTIMONIALS;
    }
}
