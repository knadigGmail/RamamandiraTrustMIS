<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHallRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'name' => ['required', 'string', 'max:150'],

            'capacity' => ['required', 'integer', 'min:1'],

            'dining_capacity' => ['nullable', 'integer', 'min:0'],

            'rooms' => ['required', 'integer', 'min:0'],

            'hall_rent' => ['required', 'numeric', 'min:0'],

            'electricity_charges' => ['nullable', 'numeric', 'min:0'],

            'cleaning_charges' => ['nullable', 'numeric', 'min:0'],

            'security_deposit' => ['nullable', 'numeric', 'min:0'],

            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],

            'status' => ['required', 'boolean'],

            'remarks' => ['nullable', 'string'],

        ];
    }

    public function messages(): array
    {
        return [

            'name.required' => 'Hall name is required.',

            'capacity.required' => 'Capacity is required.',

            'hall_rent.required' => 'Hall rent is required.',

            'photo.image' => 'Please upload a valid image.',

            'photo.max' => 'Photo must not exceed 2 MB.',

        ];
    }
}