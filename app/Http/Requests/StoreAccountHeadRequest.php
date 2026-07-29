<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountHeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'account_code' => 'required|max:20|unique:account_heads,account_code',

            'account_name' => 'required|max:255',

            'account_type' => 'required|in:Asset,Liability,Income,Expense,Capital',

            'parent_id' => 'nullable|exists:account_heads,id',

            'description' => 'nullable|max:1000',

            'is_active' => 'boolean',

        ];
    }
}