<?php

namespace App\Service\ProjectManagement;

use App\Models\Project;
use Exception;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;



class UploadImageService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function uploadThumbnail($photo, string $slug): void
    {
        $filename = $slug . '-' . 'thumb';

        $path = "projects/thumbnails/" . $filename . '.webp';


        try {
            dd([
        'gd_loaded' => extension_loaded('gd'),
        'gd_info' => gd_info(),
        'photo' => $photo,
        'photo_type' => gettype($photo),
    ]);

            $manager = new ImageManager(new Driver());
            $image = $manager->read($photo)->toWebp(80);
            Storage::disk('public')->put($path, $image); // ← ini yang kurang!
            Project::where(column: 'slug', value: $slug)->update(['thumbnail' => $path]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
