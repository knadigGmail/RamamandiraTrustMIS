<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHallRequest extends FormRequest
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

            'ac' => ['nullable', 'boolean'],

            'rooms' => ['required', 'integer', 'min:0'],

            'dining_hall' => ['nullable', 'boolean'],

            'kitchen' => ['nullable', 'boolean'],

            'rent' => ['required', 'numeric', 'min:0'],

            'security_deposit' => ['nullable', 'numeric', 'min:0'],

            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],

            'status' => ['required', 'boolean'],

            'remarks' => ['nullable', 'string'],

        ];
    }
}