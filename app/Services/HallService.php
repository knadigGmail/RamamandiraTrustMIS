<?php

namespace App\Services;

use App\Models\Hall;
use Illuminate\Http\UploadedFile;

class HallService
{
    /**
     * Get all halls.
     */
    public function getAll()
    {
        return Hall::orderBy('name')
            ->paginate(10);
    }

    /**
     * Create Hall.
     */
    public function create(array $data): Hall
    {
        // Auto Generate Hall Code
        $data['hall_code'] = CodeGeneratorService::generate(
            'halls',
            'hall_code',
            'HAL'
        );

        // Upload Photo
        if (
            isset($data['photo']) &&
            $data['photo'] instanceof UploadedFile
        ) {
            $data['photo'] = PhotoUploadService::upload(
                $data['photo'],
                'halls'
            );
        }

        return Hall::create($data);
    }

    /**
     * Update Hall.
     */
    public function update(Hall $hall, array $data): Hall
    {
        if (
            isset($data['photo']) &&
            $data['photo'] instanceof UploadedFile
        ) {
            $data['photo'] = PhotoUploadService::upload(
                $data['photo'],
                'halls',
                $hall->photo
            );
        }

        $hall->update($data);

        return $hall;
    }

    /**
     * Delete Hall.
     */
    public function delete(Hall $hall): bool
    {
        PhotoUploadService::delete($hall->photo);

        return $hall->delete();
    }
}