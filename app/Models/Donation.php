<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [

        'receipt_no',

        'receipt_date',

        'donor_id',

        'seva_id',

        'financial_account_id',

        'payment_mode',

        'amount',

        'transaction_reference',

        'remarks',

        'receipt_printed',

        'is_cancelled',

    ];

    protected $casts = [

        'receipt_date' => 'date',

        'amount' => 'decimal:2',

        'receipt_printed' => 'boolean',

        'is_cancelled' => 'boolean',

    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function seva()
    {
        return $this->belongsTo(Seva::class);
    }

    public function financialAccount()
    {
        return $this->belongsTo(FinancialAccount::class);
    }
}