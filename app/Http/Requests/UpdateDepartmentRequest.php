<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
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

            'name' => [

                'required',

                'max:150',

                Rule::unique('departments')->ignore($this->department),

            ],

            'description' => 'nullable',

            'remarks' => 'nullable',

            'status' => 'required|boolean',

        ];
    }
}