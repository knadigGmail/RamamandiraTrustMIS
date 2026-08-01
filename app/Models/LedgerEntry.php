<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LedgerEntry extends Model
{
    protected $fillable = [

        'voucher_type',

        'voucher_id',

        'entry_date',

        'account_head_id',

        'financial_account_id',

        'debit',

        'credit',

        'narration',

    ];

    public function accountHead()
    {
        return $this->belongsTo(AccountHead::class);
    }

    public function financialAccount()
    {
        return $this->belongsTo(FinancialAccount::class);
    }

}