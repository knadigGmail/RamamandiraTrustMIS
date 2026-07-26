<?php

namespace App\Services;

use App\Models\Donation;

class DonationService
{
    public function create(array $data)
    {
        return Donation::create($data);
    }

    public function update(Donation $donation, array $data)
    {
        $donation->update($data);

        return $donation;
    }

    public function delete(Donation $donation)
    {
        return $donation->delete();
    }
}