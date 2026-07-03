<?php

namespace App\Services;

use App\Models\Project;

class ProjectService
{
    public function store(array $data): void
    {
        // Melepas thumbnail dari data sebelum menambah proyek baru
        unset($data['thumbnail']);

        // Membuat proyek baru
        $project = Project::create($data);

        // Menambahkan thumbnail ke proyek baru
        $project->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
    }
}
