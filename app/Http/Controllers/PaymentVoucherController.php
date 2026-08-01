<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentVoucherRequest;
use App\Http\Requests\UpdatePaymentVoucherRequest;
use App\Models\AccountHead;
use App\Models\FinancialAccount;
use App\Models\PaymentVoucher;
use App\Services\NumberSeriesService;
use App\Services\PaymentVoucherService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PaymentVoucherController extends Controller
{
    protected PaymentVoucherService $service;
    protected NumberSeriesService $numberSeries;

    public function __construct(
        PaymentVoucherService $service,
        NumberSeriesService $numberSeries
    ) {
        $this->service = $service;
        $this->numberSeries = $numberSeries;
    }

    /**
     * Display a listing.
     */
   public function index(Request $request)
{
    $query = PaymentVoucher::with([
        'accountHead',
        'financialAccount',
        'creator',
        'approver'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    */

    if ($request->filled('search')) {

        $search = trim($request->search);

        $query->where(function ($q) use ($search) {

            $q->where('voucher_no', 'like', "%{$search}%")
              ->orWhere('payee_name', 'like', "%{$search}%")
              ->orWhere('reference_no', 'like', "%{$search}%");

        });

    }

    /*
    |--------------------------------------------------------------------------
    | Status
    |--------------------------------------------------------------------------
    */

    if ($request->filled('status')) {

        $query->where('status', $request->status);

    }

    /*
    |--------------------------------------------------------------------------
    | Payment Mode
    |--------------------------------------------------------------------------
    */

    if ($request->filled('payment_mode')) {

        $query->where('payment_mode', $request->payment_mode);

    }

    /*
    |--------------------------------------------------------------------------
    | Date Filters
    |--------------------------------------------------------------------------
    */

    if ($request->filled('from')) {

        $query->whereDate(
            'voucher_date',
            '>=',
            $request->from
        );

    }

    if ($request->filled('to')) {

        $query->whereDate(
            'voucher_date',
            '<=',
            $request->to
        );

    }

    /*
    |--------------------------------------------------------------------------
    | Statistics
    |--------------------------------------------------------------------------
    */

    $statistics = [

        'total' => PaymentVoucher::count(),

        'pending' => PaymentVoucher::where(
            'status',
            'Pending'
        )->count(),

        'approved' => PaymentVoucher::where(
            'status',
            'Approved'
        )->count(),

        'cancelled' => PaymentVoucher::where(
            'status',
            'Cancelled'
        )->count(),

        'totalAmount' => PaymentVoucher::sum('amount'),

    ];

    /*
    |--------------------------------------------------------------------------
    | Register
    |--------------------------------------------------------------------------
    */

    $paymentVouchers = $query
        ->orderByDesc('voucher_date')
        ->orderByDesc('id')
        ->paginate(15)
        ->withQueryString();

    return view(
        'payment-vouchers.index',
        compact(
            'paymentVouchers',
            'statistics'
        )
    );
}

    /**
     * Show create form.
     */
    public function create()
    {
        $voucherNo = $this->numberSeries->next('PV');

        return view('finance.payment-vouchers.create', [

            'voucherNo' => $voucherNo,

            'accountHeads' => AccountHead::orderBy('account_name')->get(),

            'financialAccounts' => FinancialAccount::where('is_active', true)
                ->orderBy('account_name')
                ->get(),

        ]);
    }

    /**
     * Store voucher.
     */
    public function store(StorePaymentVoucherRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()
            ->route('payment-vouchers.index')
            ->with('success', 'Payment Voucher created successfully.');
    }

    /**
     * Display voucher.
     */
    public function show(PaymentVoucher $paymentVoucher)
    {
        $paymentVoucher->load([
            'accountHead',
            'financialAccount',
            'creator',
            'approver'
        ]);

        return view('finance.payment-vouchers.show', compact('paymentVoucher'));
    }

    /**
     * Edit voucher.
     */
    public function edit(PaymentVoucher $paymentVoucher)
    {
        return view('payment-vouchers.edit', [

            'paymentVoucher' => $paymentVoucher,

            'accountHeads' => AccountHead::orderBy('account_name')->get(),

            'financialAccounts' => FinancialAccount::where('is_active', true)
                ->orderBy('account_name')
                ->get(),

        ]);
    }

    /**
     * Update voucher.
     */
    public function update(
        UpdatePaymentVoucherRequest $request,
        PaymentVoucher $paymentVoucher
    ) {
        $this->service->update(
            $paymentVoucher,
            $request->validated()
        );

        return redirect()
            ->route('payment-vouchers.index')
            ->with('success', 'Payment Voucher updated successfully.');
    }

    /**
     * Delete voucher.
     */
    public function destroy(PaymentVoucher $paymentVoucher)
    {
        $this->service->delete($paymentVoucher);

        return redirect()
            ->route('payment-vouchers.index')
            ->with('success', 'Payment Voucher deleted successfully.');
    }

    /**
     * Approve voucher.
     */
    public function approve(PaymentVoucher $paymentVoucher)
{
    if ($paymentVoucher->status === 'Approved') {

        return back()->with(
            'warning',
            'Voucher has already been approved.'
        );
    }

    $this->service->approve($paymentVoucher);

    return back()->with(
        'success',
        'Payment Voucher approved successfully.'
    );
}

    /**
     * Print PDF.
     */
   public function pdf(PaymentVoucher $paymentVoucher)
{
    $paymentVoucher->load([
        'accountHead',
        'financialAccount',
    ]);

    return view(
        'payment-vouchers.pdf',
        compact('paymentVoucher')
    );
}
}