<?php

namespace App\Services;

use App\Models\Donor;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DonorService
{
    public function getAll()
    {
        return Donor::orderBy('name')->paginate(10);
    }

    public function create(array $data): Donor
    {
        // Generate Donor Code
        $lastDonor = Donor::latest('id')->first();

        $nextNumber = 1;

        if ($lastDonor && preg_match('/DN(\d+)/', $lastDonor->donor_code, $matches)) {
            $nextNumber = (int) $matches[1] + 1;
        }

        $data['donor_code'] = 'DN' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        // Upload Photo
        if (isset($data['photo']) && $data['photo'] instanceof UploadedFile) {
            $data['photo'] = $data['photo']->store('donors', 'public');
        }

        return Donor::create($data);
    }

    public function update(Donor $donor, array $data): Donor
    {
        if (isset($data['photo']) && $data['photo'] instanceof UploadedFile) {

            // Delete old photo
            if ($donor->photo && Storage::disk('public')->exists($donor->photo)) {
                Storage::disk('public')->delete($donor->photo);
            }

            // Upload new photo
            $data['photo'] = $data['photo']->store('donors', 'public');
        }

        $donor->update($data);

        return $donor;
    }

    public function delete(Donor $donor): bool
    {
        // Delete photo
        if ($donor->photo && Storage::disk('public')->exists($donor->photo)) {
            Storage::disk('public')->delete($donor->photo);
        }

        return $donor->delete();
    }
}