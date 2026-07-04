<?php

namespace App\Services;

use App\Exceptions\TestimonialLimitExceededException;
use App\Models\Testimonial;
use Exception;

// Implementasi logika bisnis untuk testimonial
class TestimonialService
{
    private const MAX_VISIBLE_TESTIMONIALS = 25;

    // Mengembalikan nilai true or false untuk mengecek apakah testimonial terlihat melebihi batas
    public function hasReachedVisibleLimit(): bool
    {
        return Testimonial::visible()->count() >= self::MAX_VISIBLE_TESTIMONIALS;
    }

    // Menyimpan testimonial baru ke database
    public function store(array $data): Testimonial
    {

        if ($data['is_visible'] == 1 && $this->hasReachedVisibleLimit()) {
            throw new Exception("Mencapai batas maksimal testimonial yang ditampilkan, Silahkan ubah status testimonial!");
        }

        return Testimonial::create([
            'name' => $data['name'],
            'occupation' => $data['occupation'],
            'feedback' => $data['feedback'],
            'rating' => $data['rating'],
            'is_visible' => $data['is_visible']
        ]);
    }

    // Mengambil testimonial berdasarkan ID
    public function getTestimonialById(string $id): Testimonial
    {
        $testimonial = Testimonial::find($id, 'id');

        if (!$testimonial) {
            throw new Exception("Testimoni tidak ditemukan.", 404);
        }

        return $testimonial;
    }

    // Mengupdate testimonial yang sudah ada
    public function update(array $data, string $id): bool
    {
        if ($data['is_visible'] == 1 && $this->hasReachedVisibleLimit()) {
            throw new Exception("Mencapai batas maksimal testimonial yang ditampilkan, Silahkan ubah status testimonial!");
        }

        $testimoni = $this->getTestimonialById($id);

        $testimoni->name = $data['name'];
        $testimoni->occupation = $data['occupation'];
        $testimoni->feedback = $data['feedback'];
        $testimoni->rating = $data['rating'];
        $testimoni->is_visible = $data['is_visible'];

        return $testimoni->save();
    }

    // Mengupdate visibilitas testimonial dengan switch toggle
    public function updateVisibility(int $is_visible, string $id): bool
    {

        if ($is_visible == 1 && $this->hasReachedVisibleLimit()) {
            throw new Exception("Mencapai batas maksimal testimonial yang ditampilkan, Silahkan ubah status testimonial!");
        }

        $testimoni = $this->getTestimonialById($id);

        $testimoni->is_visible = $is_visible;

        return $testimoni->save();
    }

    // Menghapus testimonial berdasarkan Id
    public function delete(string $id): bool
    {
        $testimonial = $this->getTestimonialById($id);

        return $testimonial->delete();
    }
}
