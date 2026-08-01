<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinancialAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

  public function rules(): array
{
    return [

        'account_code' => 'required|string|max:20|unique:financial_accounts,account_code',

        'account_name' => 'required|string|max:255',

        'account_type' => 'required|in:Bank,Cash,UPI',

        'account_head_id' => 'required|exists:account_heads,id',

        'bank_name' => 'nullable|string|max:255',

        'branch' => 'nullable|string|max:255',

        'account_holder' => 'nullable|string|max:255',

        'account_number' => 'nullable|string|max:100',

        'ifsc' => 'nullable|string|max:20',

        'upi_id' => 'nullable|string|max:255',

        'opening_balance' => 'required|numeric|min:0',

        'remarks' => 'nullable|string',

        'qr_code' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        'is_default' => 'nullable|boolean',

        'is_active' => 'nullable|boolean',
    ];
}

   public function messages(): array
{
    return [

        'account_code.required' => 'Account Code is required.',

        'account_name.required' => 'Account Name is required.',

        'account_type.required' => 'Please select Account Type.',

        'account_head_id.required' => 'Please select a Chart of Account.',

        'account_head_id.exists' => 'Selected Chart of Account is invalid.',

        'opening_balance.required' => 'Opening Balance is required.',

    ];
}
}