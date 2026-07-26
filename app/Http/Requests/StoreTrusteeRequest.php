<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrusteeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
{
    return [

        'trustee_code' => 'nullable',

        'name' => 'required|string|max:150',

        'father_spouse_name' => 'nullable|string|max:150',

        'mobile' => 'nullable|string|max:20',

        'email' => 'nullable|email|max:150',

        'address' => 'nullable|string',

        'designation' => 'nullable|string|max:100',

        'joining_date' => 'nullable|date',

        'end_date' => 'nullable|date',

        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        'remarks' => 'nullable|string',

        'status' => 'required|boolean',

    ];
}
}