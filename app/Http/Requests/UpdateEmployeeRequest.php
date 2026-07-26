<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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

            'department_id' => 'nullable|exists:departments,id',

            'designation' => 'nullable|max:100',

            'mobile' => 'nullable|max:20',

            'email' => [
                'nullable',
                'email',
                Rule::unique('employees')->ignore($this->employee),
            ],

            'salary' => 'nullable|numeric|min:0',

            'joining_date' => 'nullable|date',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'remarks' => 'nullable',

            'status' => 'required|boolean',
        ];
    }
}