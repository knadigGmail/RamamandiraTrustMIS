<?php

namespace App\Services;

use App\Models\Trustee;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
class TrusteeService
{
    public function getAll()
    {
        return Trustee::orderBy('name')->paginate(10);
    }

   public function create(array $data): Trustee
{
    // Generate Trustee Code
    $lastTrustee = Trustee::latest('id')->first();

    $nextNumber = 1;

    if ($lastTrustee && preg_match('/TR(\d+)/', $lastTrustee->trustee_code, $matches)) {
        $nextNumber = (int) $matches[1] + 1;
    }

    $data['trustee_code'] = 'TR' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    // Upload Photo
    if (isset($data['photo']) && $data['photo'] instanceof UploadedFile) {
        $data['photo'] = $data['photo']->store('trustees', 'public');
    }

    return Trustee::create($data);
}

    public function find(int $id): Trustee
    {
        return Trustee::findOrFail($id);
    }

    public function update(Trustee $trustee, array $data): Trustee
{
    if (isset($data['photo']) && $data['photo'] instanceof UploadedFile) {

        // Delete old photo
        if ($trustee->photo && Storage::disk('public')->exists($trustee->photo)) {
            Storage::disk('public')->delete($trustee->photo);
        }

        // Save new photo
        $data['photo'] = $data['photo']->store('trustees', 'public');
    }

    $trustee->update($data);

    return $trustee;
}

    public function delete(Trustee $trustee): bool
{
    // Delete photo from storage
    if ($trustee->photo && Storage::disk('public')->exists($trustee->photo)) {
        Storage::disk('public')->delete($trustee->photo);
    }

    return $trustee->delete();
}
}