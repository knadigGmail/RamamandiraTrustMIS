<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentVoucherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'voucher_date' => 'required|date',

            'account_head_id' => 'required|exists:account_heads,id',

            'financial_account_id' => 'required|exists:financial_accounts,id',

            'payee_name' => 'required|max:255',

            'amount' => 'required|numeric|min:0.01',

            'payment_mode' => 'required|in:Cash,Cheque,NEFT,RTGS,UPI',

            'reference_no' => 'nullable|max:100',

            'narration' => 'nullable|max:2000',

            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',

        ];
    }
}