<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFinancialAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('financial_account')->id;

        return [

            'account_code' => 'required|string|max:20|unique:financial_accounts,account_code,' . $id,

            'account_name' => 'required|string|max:255',

            'account_type' => 'required|in:Bank,Cash,UPI',

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
}