<?php

namespace App\Http\Controllers;

use App\Models\ReceiptVoucher;
use App\Models\AccountHead;
use App\Models\FinancialAccount;
use App\Services\ReceiptVoucherService;
use App\Services\NumberSeriesService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReceiptVoucherRequest;
use App\Http\Requests\UpdateReceiptVoucherRequest;

class ReceiptVoucherController extends Controller
{
    protected ReceiptVoucherService $service;
    protected NumberSeriesService $numberSeries;

    public function __construct(
        ReceiptVoucherService $service,
        NumberSeriesService $numberSeries
    ) {
        $this->service = $service;
        $this->numberSeries = $numberSeries;
    }

    /**
     * List
     */
    public function index()
    {
        $receiptVouchers = ReceiptVoucher::with([
            'accountHead',
            'financialAccount'
        ])
        ->latest()
        ->paginate(15);

        return view('finance.receipt-vouchers.index', compact('receiptVouchers'));
    }

    /**
     * Create
     */
    public function create()
    {
        return view('finance.receipt-vouchers.create', [

            'voucherNo' => $this->numberSeries->next('RV'),

            'accountHeads' => AccountHead::where('is_active', true)
                ->orderBy('account_name')
                ->get(),

            'financialAccounts' => FinancialAccount::active()
                ->orderBy('account_name')
                ->get(),

        ]);
    }

    /**
     * Store
     */
    public function store(StoreReceiptVoucherRequest $request)
{
    $this->service->create($request->validated());

    return redirect()
        ->route('receipt-vouchers.index')
        ->with('success', 'Receipt Voucher created successfully.');
}

    /**
     * Show
     */
    public function show(ReceiptVoucher $receiptVoucher)
    {
        return view(
            'finance.receipt-vouchers.show',
            compact('receiptVoucher')
        );
    }

    /**
     * Edit
     */
    public function edit(ReceiptVoucher $receiptVoucher)
    {
        return view('finance.receipt-vouchers.edit', [

            'receiptVoucher' => $receiptVoucher,

            'accountHeads' => AccountHead::where('is_active', true)
                ->orderBy('account_name')
                ->get(),

            'financialAccounts' => FinancialAccount::active()
                ->orderBy('account_name')
                ->get(),

        ]);
    }

    /**
     * Update
     */
   public function update(
    UpdateReceiptVoucherRequest $request,
    ReceiptVoucher $receiptVoucher
)
{
    $this->service->update(
        $receiptVoucher,
        $request->validated()
    );

    return redirect()
        ->route('receipt-vouchers.index')
        ->with('success', 'Receipt Voucher updated successfully.');
}

    /**
     * Delete
     */
  public function destroy(ReceiptVoucher $receiptVoucher)
{
    $this->service->delete($receiptVoucher);

    return redirect()
        ->route('receipt-vouchers.index')
        ->with('success', 'Receipt Voucher deleted successfully.');
}
public function approve(ReceiptVoucher $receiptVoucher)
{
    $this->service->approve($receiptVoucher);

    return redirect()
        ->route('receipt-vouchers.index')
        ->with('success', 'Receipt Voucher approved successfully.');
}
public function pdf(ReceiptVoucher $receiptVoucher)
{
    return response()->json([
        'message' => 'Receipt Voucher PDF will be implemented in Sprint 5.3'
    ]);
}
}