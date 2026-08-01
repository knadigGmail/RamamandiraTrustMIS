<?php

namespace App\Services;

use App\Models\ReceiptVoucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReceiptVoucherService
{
    protected NumberSeriesService $numberSeries;
    protected LedgerEntryService $ledger;

    public function __construct(
        NumberSeriesService $numberSeries,
        LedgerEntryService $ledger
    ) {
        $this->numberSeries = $numberSeries;
        $this->ledger = $ledger;
    }

    /**
     * Create Receipt Voucher
     */
    public function create(array $data): ReceiptVoucher
    {
        $data['voucher_no'] = $this->numberSeries->next('RV');

        $data['created_by'] = Auth::id();

        if (!empty($data['attachment'])) {
            $data['attachment'] = $data['attachment']
                ->store('receipt-vouchers', 'public');
        }

        return ReceiptVoucher::create($data);
    }

    /**
     * Update Receipt Voucher
     */
    public function update(ReceiptVoucher $voucher, array $data): ReceiptVoucher
    {
        if (!empty($data['attachment'])) {

            if ($voucher->attachment) {
                Storage::disk('public')->delete($voucher->attachment);
            }

            $data['attachment'] = $data['attachment']
                ->store('receipt-vouchers', 'public');
        }

        $voucher->update($data);

        return $voucher;
    }

    /**
     * Delete Receipt Voucher
     */
    public function delete(ReceiptVoucher $voucher): void
    {
        if ($voucher->attachment) {
            Storage::disk('public')->delete($voucher->attachment);
        }

        $voucher->delete();
    }

    /**
     * Approve Receipt Voucher
     */
   public function approve(ReceiptVoucher $voucher): void
{
    $voucher->update([
        'status' => 'Approved',
        'approved_by' => Auth::id(),
        'approved_at' => now(),
    ]);

   

   $this->ledger->postReceiptVoucher($voucher);
}

    /**
     * Cancel Receipt Voucher
     */
    public function cancel(ReceiptVoucher $voucher): void
    {
        $voucher->update([
            'status' => 'Cancelled',
        ]);
    }
}