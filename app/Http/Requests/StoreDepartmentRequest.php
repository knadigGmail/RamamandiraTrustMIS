<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
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

            'department_code' => 'nullable',

            'name' => 'required|max:150|unique:departments,name',

            'description' => 'nullable',

            'remarks' => 'nullable',

            'status' => 'required|boolean',

        ];
    }
}