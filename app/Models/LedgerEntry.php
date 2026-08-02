<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LedgerEntry extends Model
{
    protected $fillable = [

        'voucher_date',

        'voucher_type',

        'voucher_no',

        'account_head_id',

        'financial_account_id',

        'debit',

        'credit',

        'reference',

        'narration',

        'created_by'

    ];

    public function accountHead()
    {
        return $this->belongsTo(AccountHead::class);
    }

    public function financialAccount()
    {
        return $this->belongsTo(FinancialAccount::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}