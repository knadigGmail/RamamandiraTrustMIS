<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDonationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
   public function rules(): array
{
    return [

        'receipt_no' => 'required|string|max:30|unique:donations,receipt_no,' . $this->route('donation')->id,

        'receipt_date' => 'required|date',

        'donor_id' => 'required|exists:donors,id',

        'seva_id' => 'required|exists:sevas,id',

        'financial_account_id' => 'required|exists:financial_accounts,id',

        'payment_mode' => 'required|in:Cash,Bank,UPI,Cheque',

        'amount' => 'required|numeric|min:1',

        'transaction_reference' => 'nullable|string|max:100',

        'remarks' => 'nullable|string',

        'receipt_printed' => 'nullable|boolean',

        'is_cancelled' => 'nullable|boolean',

    ];
}
}
