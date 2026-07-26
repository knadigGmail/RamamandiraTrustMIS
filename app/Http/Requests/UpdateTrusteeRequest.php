<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTrusteeRequest extends FormRequest
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

            'name' => 'required|max:150',

            'father_spouse_name' => 'nullable|max:150',

            'mobile' => 'nullable|max:20',

            'email' => [
                'nullable',
                'email',
                Rule::unique('trustees')->ignore($this->trustee),
            ],

            'address' => 'nullable',

            'designation' => 'nullable|max:100',

            'joining_date' => 'nullable|date',

            'end_date' => 'nullable|date',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'remarks' => 'nullable',

            'status' => 'nullable|boolean',
        ];
    }
}