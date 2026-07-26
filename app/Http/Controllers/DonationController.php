<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;
use App\Models\Donation;
use App\Models\Donor;
use App\Models\FinancialAccount;
use App\Models\Seva;
use App\Services\DonationService;
use Illuminate\Http\Request;
use App\Services\NumberSeriesService;
use Barryvdh\DomPDF\Facade\Pdf;
class DonationController extends Controller
{
    protected DonationService $service;
protected NumberSeriesService $numberSeries;

public function __construct(
    DonationService $service,
    NumberSeriesService $numberSeries
) {
    $this->service = $service;
    $this->numberSeries = $numberSeries;
}

    public function index(Request $request)
    {
        $donations = Donation::with([
                'donor',
                'seva',
                'financialAccount'
            ])
            ->latest()
            ->paginate(15);

        return view('donations.index', compact('donations'));
    }

    public function create()
    {
$receiptNo = $this->numberSeries->next('DON');
        return view('donations.create', [

            'receiptNo' => $receiptNo,

            'donors' => Donor::orderBy('name')->get(),

            'sevas' => Seva::where('is_active', true)->orderBy('seva_name')->get(),

            'accounts' => FinancialAccount::where('is_active', true)->orderBy('account_name')->get(),

        ]);
    }

    public function store(StoreDonationRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()
            ->route('donations.index')
            ->with('success', 'Donation saved successfully.');
    }

    public function show(Donation $donation)
    {
        $donation->load([
            'donor',
            'seva',
            'financialAccount'
        ]);

        return view('donations.show', compact('donation'));
    }

    public function edit(Donation $donation)
    {
        return view('donations.edit', [

            'donation' => $donation,

            'donors' => Donor::orderBy('name')->get(),

            'sevas' => Seva::where('is_active', true)->orderBy('seva_name')->get(),

            'accounts' => FinancialAccount::where('is_active', true)->orderBy('account_name')->get(),

        ]);
    }

    public function update(UpdateDonationRequest $request, Donation $donation)
    {
        $this->service->update($donation, $request->validated());

        return redirect()
            ->route('donations.index')
            ->with('success', 'Donation updated successfully.');
    }

    public function destroy(Donation $donation)
    {
        $this->service->delete($donation);

        return redirect()
            ->route('donations.index')
            ->with('success', 'Donation deleted successfully.');
    }
    public function receipt(\App\Models\Donation $donation)
{
    $pdf = Pdf::loadView('receipts.donation', [
        'donation' => $donation
    ]);

    return $pdf->stream(
        'Donation-' . $donation->receipt_no . '.pdf'
    );
}
}