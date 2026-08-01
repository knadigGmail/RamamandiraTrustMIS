<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReceiptVoucherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'voucher_date' => 'required|date',

            'received_from' => 'required|string|max:255',

            'account_head_id' => 'required|exists:account_heads,id',

            'financial_account_id' => 'required|exists:financial_accounts,id',

            'amount' => 'required|numeric|min:0.01',

            'receipt_mode' => 'required|in:Cash,Cheque,NEFT,RTGS,UPI',

            'reference_no' => 'nullable|string|max:100',

            'narration' => 'nullable|string',

            'attachment' => 'nullable|file|max:5120',
        ];
    }

    public function messages(): array
    {
        return [

            'received_from.required' => 'Please enter the name of the person or organization.',

            'account_head_id.required' => 'Please select an Income Account.',

            'financial_account_id.required' => 'Please select a Cash/Bank Account.',

            'amount.required' => 'Amount is required.',

            'receipt_mode.required' => 'Please select Receipt Mode.',
        ];
    }
}