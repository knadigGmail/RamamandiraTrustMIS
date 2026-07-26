<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSevaRequest extends FormRequest
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

            'seva_code' => 'required|string|max:20|unique:sevas,seva_code,' . $this->route('seva')->id,

            'seva_name' => 'required|string|max:255',

            'category' => 'nullable|string|max:100',

            'suggested_amount' => 'required|numeric|min:0',

            'minimum_amount' => 'required|numeric|min:0',

            'receipt_required' => 'nullable|boolean',

            'is_active' => 'nullable|boolean',

            'description' => 'nullable|string',

        ];
    }
}