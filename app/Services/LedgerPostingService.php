<?php

namespace App\Services;

use App\Models\LedgerEntry;

class LedgerPostingService
{
    public function post(
        $voucherDate,
        $voucherType,
        $voucherNo,
        $debitAccount,
        $creditAccount,
        $amount,
        $reference = null,
        $narration = null,
        $financialAccount = null
    ) {

        LedgerEntry::create([
            'voucher_date'         => $voucherDate,
            'voucher_type'         => $voucherType,
            'voucher_no'           => $voucherNo,
            'account_head_id'      => $debitAccount,
            'financial_account_id' => $financialAccount,
            'debit'                => $amount,
            'credit'               => 0,
            'reference'            => $reference,
            'narration'            => $narration,
            'created_by'           => auth()->id(),
        ]);

        LedgerEntry::create([
            'voucher_date'         => $voucherDate,
            'voucher_type'         => $voucherType,
            'voucher_no'           => $voucherNo,
            'account_head_id'      => $creditAccount,
            'financial_account_id' => $financialAccount,
            'debit'                => 0,
            'credit'               => $amount,
            'reference'            => $reference,
            'narration'            => $narration,
            'created_by'           => auth()->id(),
        ]);
    }
}