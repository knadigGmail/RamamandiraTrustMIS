<?php

namespace App\Http\Controllers;

use App\Models\LedgerEntry;
use App\Models\AccountHead;
use App\Models\FinancialAccount;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    public function index(Request $request)
    {
        $query = LedgerEntry::with([
            'accountHead',
            'financialAccount'
        ]);

        if ($request->filled('account_head_id')) {
            $query->where('account_head_id', $request->account_head_id);
        }

        if ($request->filled('financial_account_id')) {
            $query->where('financial_account_id', $request->financial_account_id);
        }

        if ($request->filled('voucher_type')) {
            $query->where('voucher_type', $request->voucher_type);
        }

        if ($request->filled('from_date')) {
            $query->whereDate('entry_date', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('entry_date', '<=', $request->to_date);
        }

        $entries = $query
            ->orderBy('entry_date')
            ->orderBy('id')
            ->paginate(25);

        return view('finance.ledger.index', [

            'entries' => $entries,

            'accountHeads' => AccountHead::orderBy('account_name')->get(),

            'financialAccounts' => FinancialAccount::orderBy('account_name')->get(),

        ]);
    }
}