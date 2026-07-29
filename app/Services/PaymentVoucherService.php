<?php

namespace App\Services;

use App\Models\PaymentVoucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentVoucherService
{
    protected NumberSeriesService $numberSeries;

    public function __construct(NumberSeriesService $numberSeries)
    {
        $this->numberSeries = $numberSeries;
    }

    /**
     * Create Voucher
     */
    public function create(array $data): PaymentVoucher
    {
        $data['voucher_no'] = $this->numberSeries->next('PV');

        $data['created_by'] = Auth::id();

        if (!empty($data['attachment'])) {

            $data['attachment'] = $data['attachment']
                ->store('payment-vouchers', 'public');
        }

        return PaymentVoucher::create($data);
    }

    /**
     * Update Voucher
     */
    public function update(PaymentVoucher $voucher, array $data): PaymentVoucher
    {
        if (!empty($data['attachment'])) {

            if ($voucher->attachment) {

                Storage::disk('public')
                    ->delete($voucher->attachment);
            }

            $data['attachment'] = $data['attachment']
                ->store('payment-vouchers', 'public');
        }

        $voucher->update($data);

        return $voucher;
    }

    /**
     * Delete Voucher
     */
    public function delete(PaymentVoucher $voucher): void
    {
        if ($voucher->attachment) {

            Storage::disk('public')
                ->delete($voucher->attachment);
        }

        $voucher->delete();
    }

    /**
     * Approve Voucher
     */
    public function approve(PaymentVoucher $voucher): void
    {
        $voucher->update([

            'status' => 'Approved',

            'approved_by' => Auth::id(),

            'approved_at' => now(),

        ]);

        /*
        Future Sprint:
        ----------------
        Post to Ledger
        Update Cash Book
        Update Bank Book
        */
    }

    /**
     * Cancel Voucher
     */
    public function cancel(PaymentVoucher $voucher): void
    {
        $voucher->update([

            'status' => 'Cancelled',

        ]);
    }
}