<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [

            'name' => ['required', 'string', 'max:150'],

            'father_spouse_name' => ['nullable', 'string', 'max:150'],

            'gender' => ['nullable', Rule::in(['Male', 'Female', 'Other'])],

            'date_of_birth' => ['nullable', 'date'],

            'mobile' => ['required', 'string', 'max:20'],

            'alternate_mobile' => ['nullable', 'string', 'max:20'],

            'email' => ['nullable', 'email', 'max:150'],

            'aadhaar_no' => ['nullable', 'string', 'max:20'],

            'pan_no' => ['nullable', 'string', 'max:20'],

            'address' => ['nullable', 'string'],

            'city' => ['nullable', 'string', 'max:100'],

            'state' => ['nullable', 'string', 'max:100'],

            'pincode' => ['nullable', 'string', 'max:10'],

            'gotra' => ['nullable', 'string', 'max:100'],

            'family_name' => ['nullable', 'string', 'max:150'],

            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],

            'is_donor' => ['nullable', 'boolean'],

            'is_devotee' => ['nullable', 'boolean'],

            'is_life_member' => ['nullable', 'boolean'],

            'status' => ['required', 'boolean'],

            'remarks' => ['nullable', 'string'],

        ];
    }

    public function messages(): array
    {
        return [

            'name.required' => 'Customer name is required.',

            'mobile.required' => 'Mobile number is required.',

            'photo.image' => 'Please upload a valid image.',

            'photo.max' => 'Photo size must not exceed 2 MB.',

        ];
    }
}