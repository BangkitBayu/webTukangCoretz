<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Testimonial;
use Exception;

class ProjectService
{
    // Menyimpan proyek baru ke database
    public function store(array $data): void
    {
        // Melepas thumbnail dari data sebelum menambah proyek baru
        unset($data['thumbnail']);

        // Membuat proyek baru
        $project = Project::create($data);

        // Menambahkan thumbnail ke proyek baru
        $project->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
    }

    // Mengambil proyek berdasarkan ID
    public function getProjectById(string $id): Project
    {
        $project = Project::select(['id', 'name', 'description', 'category_project_id', 'is_visible'])->find($id, 'id');

        if (!$project) {
            throw new Exception('Proyek tidak ditemukan', 404);
        }

        return $project;
    }

    // Mengupdate proyek yang sudah ada
    public function update(array $data, string $id): void
    {
        // Melepas thumbnail dari data sebelum mengupdate proyek
        unset($data['thumbnail']);

        // Mengambil proyek berdasarkan ID
        $project = $this->getProjectById($id);

        // Mengupdate proyek
        $project->update($data);

        // Jika ada thumbnail baru, tambahkan ke proyek
        if (request()->hasFile('thumbnail')) {
            $project->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }
    }

    // Menghapus proyek berdasarkan Id
    public function delete(string $id): bool
    {
        // Mengambil proyek berdasarkan ID
        $project = $this->getProjectById($id);

        // Menghapus proyek
        return $project->delete($id);
    }

     public function updateVisibility(int $is_visible, string $id): bool
    {

        $project = $this->getProjectById($id);

        $project->is_visible = $is_visible;

        return $project->save();
    }
}
