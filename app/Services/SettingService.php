<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingService
{
    
 public function first()
    {
        return Setting::first();
    }

    public function save(array $data)
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $setting->fill($data);
        $setting->save();

        return $setting;
    }

public function get()
    {
        return Setting::firstOrCreate(
            ['id' => 1],
            [
                'trust_name' => 'RAMAMANDIRA TRUST',
                'receipt_prefix' => 'RT'
            ]
        );
    }

    public function update(array $data)
    {
        $setting = $this->get();

        if (isset($data['logo'])) {

            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }

            $data['logo'] = $data['logo']->store(
                'trust',
                'public'
            );
        }

        $setting->update($data);

        return $setting;
    }
}