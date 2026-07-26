<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PhotoUploadService
{
    /**
     * Upload a new file or replace an existing file.
     */
    public static function upload(
        ?UploadedFile $file,
        string $folder,
        ?string $oldFile = null
    ): ?string {

        if (!$file) {
            return $oldFile;
        }

        self::delete($oldFile);

        return $file->store($folder, 'public');
    }

    /**
     * Delete an uploaded file.
     */
    public static function delete(?string $file): void
    {
        if (!$file) {
            return;
        }

        if (Storage::disk('public')->exists($file)) {
            Storage::disk('public')->delete($file);
        }
    }

    /**
     * Get public URL of uploaded file.
     */
    public static function url(?string $file): string
    {
        if (!$file) {
            return asset('images/no-image.png');
        }

        return Storage::url($file);
    }
}