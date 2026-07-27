<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingService
{
    public function get()
    {
        return Setting::firstOrCreate(
            ['id' => 1],
            [
                'trust_name' => 'RAMAMANDIRA TRUST',
                'receipt_prefix' => 'RT',
                'currency' => 'INR',
                'timezone' => 'Asia/Kolkata',
            ]
        );
    }

    public function update(array $data)
    {
        $setting = $this->get();

        foreach (['logo', 'signature', 'qr_code'] as $file) {

            if (isset($data[$file])) {

                if ($setting->$file) {
                    Storage::disk('public')->delete($setting->$file);
                }

                $data[$file] = $data[$file]->store('trust', 'public');
            }
        }

        // THIS WAS MISSING
        $setting->fill($data);
        $setting->save();

        return $setting;
    }
}