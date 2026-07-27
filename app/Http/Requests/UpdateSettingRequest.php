<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'trust_name' => 'required|max:255',

            'email' => 'nullable|email',

            'website' => 'nullable|url',

            'mobile' => 'nullable|max:20',

            'phone' => 'nullable|max:20',

            'logo' => 'nullable|image|max:2048',

            'signature' => 'nullable|image|max:2048',

            'qr_code' => 'nullable|image|max:2048',

        ];
    }
}