<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'booking_date' => ['required','date'],

            'customer_name' => ['required','string','max:150'],

            'father_spouse_name' => ['nullable','string','max:150'],

            'mobile' => ['required','string','max:20'],

            'alternate_mobile' => ['nullable','string','max:20'],

            'address' => ['nullable','string'],

            'function_date' => ['required','date'],

            'function_type' => ['required','string','max:100'],

            'hall_name' => ['required','string','max:150'],

            'guest_count' => ['required','integer','min:1'],

            'checkin_datetime' => ['nullable','date'],

            'checkout_datetime' => ['nullable','date'],

            'rooms_required' => ['nullable','integer','min:0'],

            'hall_charges' => ['required','numeric','min:0'],

            'advance_amount' => ['nullable','numeric','min:0'],

            'balance_amount' => ['nullable','numeric','min:0'],

            'security_deposit' => ['nullable','numeric','min:0'],

            'customer_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ],

            'aadhaar_copy' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:4096'
            ],

            'agreement_copy' => [
                'nullable',
                'file',
                'mimes:pdf',
                'max:4096'
            ],

            'status' => [
                'required',
                'in:Reserved,Confirmed,Cancelled,Completed'
            ],

            'remarks' => ['nullable','string'],
        ];
    }

    public function messages(): array
    {
        return [

            'customer_name.required' => 'Customer name is required.',

            'mobile.required' => 'Mobile number is required.',

            'hall_name.required' => 'Please select a hall.',

            'function_date.required' => 'Function date is required.',

            'hall_charges.required' => 'Hall charges are required.',

            'customer_photo.image' => 'Please upload a valid customer photo.',

            'aadhaar_copy.mimes' => 'Aadhaar must be PDF/JPG/PNG.',

            'agreement_copy.mimes' => 'Agreement must be PDF.',
        ];
    }
}