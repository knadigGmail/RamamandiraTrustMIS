<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [

        'trust_name',
        'address',
        'phone',
        'email',
        'website',
        'logo',

        'receipt_prefix',
        'receipt_footer',
        'blessing_message',

        'reply_to_email',

        'whatsapp_number',
        'whatsapp_message',

        'bank_name',
        'branch',
        'account_number',
        'ifsc',
        'upi_id',
    ];
}