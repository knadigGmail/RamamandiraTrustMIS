<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFinancialAccountRequest;
use App\Http\Requests\UpdateFinancialAccountRequest;
use App\Models\FinancialAccount;
use App\Services\FinancialAccountService;
use Illuminate\Http\Request;

class FinancialAccountController extends Controller
{
    protected FinancialAccountService $service;

    public function __construct(FinancialAccountService $service)
    {
        $this->service = $service;
    }

    /**
     * Display listing
     */
    public function index(Request $request)
    {
        $accounts = FinancialAccount::query()

            ->when($request->search, function ($query) use ($request) {

                $search = $request->search;

                $query->where('account_code', 'like', "%{$search}%")
                    ->orWhere('account_name', 'like', "%{$search}%")
                    ->orWhere('bank_name', 'like', "%{$search}%")
                    ->orWhere('upi_id', 'like', "%{$search}%");
            })

            ->orderBy('account_name')

            ->paginate(15);

        return view('financial_accounts.index', [

            'accounts' => $accounts,

            'totalAccounts' => FinancialAccount::count(),

            'bankAccounts' => FinancialAccount::where('account_type', 'Bank')->count(),

            'cashAccounts' => FinancialAccount::where('account_type', 'Cash')->count(),

            'upiAccounts' => FinancialAccount::where('account_type', 'UPI')->count(),

        ]);
    }

    /**
     * Create Form
     */
    public function create()
    {
        $next = FinancialAccount::count() + 1;

        $accountCode = sprintf('FA-%04d', $next);

        return view(
            'financial_accounts.create',
            compact('accountCode')
        );
    }

    /**
     * Save
     */
    public function store(StoreFinancialAccountRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('qr_code')) {

            $data['qr_code'] = $request
                ->file('qr_code')
                ->store('financial_accounts', 'public');
        }

        $this->service->create($data);

        return redirect()
            ->route('financial-accounts.index')
            ->with('success', 'Financial Account created successfully.');
    }

    /**
     * Display
     */
    public function show(FinancialAccount $financialAccount)
    {
        return view(
            'financial_accounts.show',
            compact('financialAccount')
        );
    }

    /**
     * Edit Form
     */
    public function edit(FinancialAccount $financialAccount)
    {
        return view(
            'financial_accounts.edit',
            compact('financialAccount')
        );
    }

    /**
     * Update
     */
    public function update(
        UpdateFinancialAccountRequest $request,
        FinancialAccount $financialAccount
    ) {
        $data = $request->validated();

        if ($request->hasFile('qr_code')) {

            $data['qr_code'] = $request
                ->file('qr_code')
                ->store('financial_accounts', 'public');
        }

        $this->service->update($financialAccount, $data);

        return redirect()
            ->route('financial-accounts.index')
            ->with('success', 'Financial Account updated successfully.');
    }

    /**
     * Delete
     */
    public function destroy(FinancialAccount $financialAccount)
    {
        $this->service->delete($financialAccount);

        return redirect()
            ->route('financial-accounts.index')
            ->with('success', 'Financial Account deleted successfully.');
    }
}