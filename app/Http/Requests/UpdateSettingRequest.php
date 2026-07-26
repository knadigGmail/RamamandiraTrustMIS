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

            'address' => 'nullable|max:255',

            'phone' => 'nullable|max:30',

            'email' => 'nullable|email|max:255',

            'website' => 'nullable|max:255',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'receipt_prefix' => 'required|max:20',

            'receipt_footer' => 'nullable',

            'blessing_message' => 'nullable',

            'reply_to_email' => 'nullable|email',

            'whatsapp_number' => 'nullable|max:20',

            'whatsapp_message' => 'nullable',

            'bank_name' => 'nullable|max:255',

            'branch' => 'nullable|max:255',

            'account_number' => 'nullable|max:100',

            'ifsc' => 'nullable|max:20',

            'upi_id' => 'nullable|max:255',
        ];
    }
}