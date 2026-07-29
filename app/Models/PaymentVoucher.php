<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentVoucher extends Model
{
    protected $fillable = [

        'voucher_no',

        'voucher_date',

        'account_head_id',

        'financial_account_id',

        'payee_name',

        'amount',

        'narration',

        'reference_no',

        'attachment',

        'payment_mode',

        'status',

        'created_by',

        'approved_by',

        'approved_at',

    ];

    protected $casts = [

        'voucher_date' => 'date',

        'approved_at' => 'datetime',

        'amount' => 'decimal:2',

    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function accountHead()
    {
        return $this->belongsTo(AccountHead::class);
    }

    public function financialAccount()
    {
        return $this->belongsTo(FinancialAccount::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}