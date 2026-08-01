<?php

namespace App\Services;

use App\Models\LedgerEntry;
use App\Models\PaymentVoucher;
use App\Models\ReceiptVoucher;
class LedgerEntryService
{
    public function postPaymentVoucher(PaymentVoucher $voucher): void
    {
        // Remove existing entries (for edit/repost)
        LedgerEntry::where('voucher_type', 'PAYMENT')
            ->where('voucher_id', $voucher->id)
            ->delete();

        // Debit Expense Account
        LedgerEntry::create([
            'voucher_type'         => 'PAYMENT',
            'voucher_id'           => $voucher->id,
            'entry_date'           => $voucher->voucher_date,
            'account_head_id'      => $voucher->account_head_id,
            'financial_account_id' => $voucher->financial_account_id,
            'debit'                => $voucher->amount,
            'credit'               => 0,
            'narration'            => $voucher->narration,
        ]);

        // Credit Cash / Bank Account
        LedgerEntry::create([
            'voucher_type'         => 'PAYMENT',
            'voucher_id'           => $voucher->id,
            'entry_date'           => $voucher->voucher_date,
            'account_head_id'      => $voucher->financial_account_id,
            'financial_account_id' => $voucher->financial_account_id,
            'debit'                => 0,
            'credit'               => $voucher->amount,
            'narration'            => $voucher->narration,
        ]);
    }
  public function postReceiptVoucher(ReceiptVoucher $voucher): void
{
  
    // Remove old entries if reposting
    LedgerEntry::where('voucher_type', 'RECEIPT')
        ->where('voucher_id', $voucher->id)
        ->delete();

    /*
     |----------------------------------------------------
     | Debit Cash / Bank Account
     |----------------------------------------------------
     */

    LedgerEntry::create([

    'voucher_type'         => 'RECEIPT',

    'voucher_id'           => $voucher->id,

    'entry_date'           => $voucher->voucher_date,

    'account_head_id'      => $voucher->financialAccount->account_head_id,

    'financial_account_id' => $voucher->financial_account_id,

    'debit'                => $voucher->amount,

    'credit'               => 0,

    'narration'            => $voucher->narration,

]);

    /*
     |----------------------------------------------------
     | Credit Income Account
     |----------------------------------------------------
     */

    LedgerEntry::create([

        'voucher_type'         => 'RECEIPT',

        'voucher_id'           => $voucher->id,

        'entry_date'           => $voucher->voucher_date,

        'account_head_id'      => $voucher->account_head_id,

        'financial_account_id' => $voucher->financial_account_id,

        'debit'                => 0,

        'credit'               => $voucher->amount,

        'narration'            => $voucher->narration,

    ]);
}
}