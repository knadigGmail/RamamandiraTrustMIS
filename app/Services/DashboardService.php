<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Donation;
use App\Models\PaymentVoucher;
use App\Models\ReceiptVoucher;
use App\Models\Trustee;
use App\Models\Employee;
use App\Models\Donor;
use App\Models\Customer;

class DashboardService
{
    public function getDashboardData(): array
    {
        return [

            'bookings' => Booking::count(),

            'trustees' => Trustee::count(),

            'employees' => Employee::count(),

            'customers' => Customer::count(),

            'donors' => Donor::count(),

            'paymentVouchers' => PaymentVoucher::count(),

            'receiptVouchers' => ReceiptVoucher::count(),

            'todayReceipts' => ReceiptVoucher::whereDate(
                'voucher_date',
                today()
            )->sum('amount'),

            'todayPayments' => PaymentVoucher::whereDate(
                'voucher_date',
                today()
            )->sum('amount'),

'monthReceipts' => ReceiptVoucher::whereYear('voucher_date', now()->year)
    ->whereMonth('voucher_date', now()->month)
    ->sum('amount'),

'monthPayments' => PaymentVoucher::whereYear('voucher_date', now()->year)
    ->whereMonth('voucher_date', now()->month)
    ->sum('amount'),

            'recentReceipts' => ReceiptVoucher::latest()
                ->take(5)
                ->get(),

            'recentPayments' => PaymentVoucher::latest()
                ->take(5)
                ->get(),

        ];
    }
}