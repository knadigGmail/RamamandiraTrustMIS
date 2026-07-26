<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDonorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'name' => 'required|max:150',

            'father_spouse_name' => 'nullable|max:150',

            'mobile' => 'required|max:20',

            'alternate_mobile' => 'nullable|max:20',

            'email' => [
                'nullable',
                'email',
                Rule::unique('donors')->ignore($this->donor),
            ],

            'address' => 'nullable',

            'city' => 'nullable|max:100',

            'state' => 'nullable|max:100',

            'pincode' => 'nullable|max:10',

            'pan_no' => 'nullable|max:20',

            'aadhaar_no' => 'nullable|max:20',

            'dob' => 'nullable|date',

            'anniversary' => 'nullable|date',

            'occupation' => 'nullable|max:100',

            'gotra' => 'nullable|max:100',

            'family_name' => 'nullable|max:100',

            'is_life_member' => 'nullable|boolean',

            'membership_no' => 'nullable|max:30',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'remarks' => 'nullable',

            'status' => 'nullable|boolean',

        ];
    }
}