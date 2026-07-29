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

    // Search by Voucher No or Payee
    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('voucher_no', 'like', "%{$search}%")
              ->orWhere('payee_name', 'like', "%{$search}%");
        });
    }

    // Filter by Status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Filter by Payment Mode
    if ($request->filled('payment_mode')) {
        $query->where('payment_mode', $request->payment_mode);
    }

    $paymentVouchers = $query
        ->latest('voucher_date')
        ->paginate(15)
        ->withQueryString();

    return view('finance.payment-vouchers.index', [
        'paymentVouchers' => $paymentVouchers,

        'totalVouchers' => PaymentVoucher::count(),

        'draftCount' => PaymentVoucher::where('status', 'Draft')->count(),

        'approvedCount' => PaymentVoucher::where('status', 'Approved')->count(),

        'cancelledCount' => PaymentVoucher::where('status', 'Cancelled')->count(),

        'totalAmount' => PaymentVoucher::sum('amount'),
    ]);
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
            ->route('finance.payment-vouchers.index')
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
            ->route('finance.payment-vouchers.index')
            ->with('success', 'Payment Voucher updated successfully.');
    }

    /**
     * Delete voucher.
     */
    public function destroy(PaymentVoucher $paymentVoucher)
    {
        $this->service->delete($paymentVoucher);

        return redirect()
            ->route('finance.payment-vouchers.index')
            ->with('success', 'Payment Voucher deleted successfully.');
    }

    /**
     * Approve voucher.
     */
    public function approve(PaymentVoucher $paymentVoucher)
    {
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
        $pdf = Pdf::loadView(
            'receipts.payment-voucher',
            compact('paymentVoucher')
        );

        return $pdf->stream(
            'PaymentVoucher-' .
            $paymentVoucher->voucher_no .
            '.pdf'
        );
    }
}