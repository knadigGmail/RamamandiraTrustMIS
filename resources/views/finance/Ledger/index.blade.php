@extends('layouts.app')

@section('title','General Ledger')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3>General Ledger</h3>

            <small class="text-muted">
                Ledger entries generated from approved vouchers
            </small>

        </div>

    </div>

    <form method="GET" class="card card-body mb-3">

        <div class="row">

            <div class="col-md-2">

                <label>From Date</label>

                <input type="date"
                       name="from_date"
                       value="{{ request('from_date') }}"
                       class="form-control">

            </div>

            <div class="col-md-2">

                <label>To Date</label>

                <input type="date"
                       name="to_date"
                       value="{{ request('to_date') }}"
                       class="form-control">

            </div>

            <div class="col-md-3">

                <label>Account Head</label>

                <select name="account_head_id" class="form-select">

                    <option value="">All</option>

                    @foreach($accountHeads as $head)

                        <option value="{{ $head->id }}"
                            {{ request('account_head_id')==$head->id?'selected':'' }}>

                            {{ $head->account_code }}
                            -
                            {{ $head->account_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-3">

                <label>Financial Account</label>

                <select name="financial_account_id"
                        class="form-select">

                    <option value="">All</option>

                    @foreach($financialAccounts as $account)

                        <option value="{{ $account->id }}"
                            {{ request('financial_account_id')==$account->id?'selected':'' }}>

                            {{ $account->account_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-2">

                <label>Voucher Type</label>

                <select name="voucher_type"
                        class="form-select">

                    <option value="">All</option>

                    <option value="PAYMENT"
                        {{ request('voucher_type')=='PAYMENT'?'selected':'' }}>
                        PAYMENT
                    </option>

                    <option value="RECEIPT"
                        {{ request('voucher_type')=='RECEIPT'?'selected':'' }}>
                        RECEIPT
                    </option>

                </select>

            </div>

        </div>

        <div class="mt-3">

            <button class="btn btn-primary">

                <i class="fas fa-search"></i>

                Filter

            </button>

            <a href="{{ route('ledger.index') }}"
               class="btn btn-secondary">

                Reset

            </a>

        </div>

    </form>

    <div class="card shadow">

        <div class="table-responsive">

            <table class="table table-bordered table-striped mb-0">

                <thead class="table-dark">

                <tr>

                    <th>Date</th>

                    <th>Voucher</th>

                    <th>Account Head</th>

                    <th>Financial Account</th>

                    <th>Narration</th>

                    <th class="text-end">Debit</th>

                    <th class="text-end">Credit</th>

                </tr>

                </thead>

                <tbody>

                @php

                    $totalDebit=0;

                    $totalCredit=0;

                @endphp

                @forelse($entries as $entry)

                    @php

                        $totalDebit+=$entry->debit;

                        $totalCredit+=$entry->credit;

                    @endphp

                    <tr>

                        <td>

                            {{ $entry->entry_date->format('d-m-Y') }}

                        </td>

                        <td>

                            {{ $entry->voucher_type }}

                            #{{ $entry->voucher_id }}

                        </td>

                        <td>

                            {{ $entry->accountHead->account_name ?? '' }}

                        </td>

                        <td>

                            {{ $entry->financialAccount->account_name ?? '' }}

                        </td>

                        <td>

                            {{ $entry->narration }}

                        </td>

                        <td class="text-end">

                            {{ number_format($entry->debit,2) }}

                        </td>

                        <td class="text-end">

                            {{ number_format($entry->credit,2) }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="text-center">

                            No Ledger Entries Found

                        </td>

                    </tr>

                @endforelse

                </tbody>

                <tfoot class="table-light">

                <tr>

                    <th colspan="5"
                        class="text-end">

                        Totals

                    </th>

                    <th class="text-end">

                        {{ number_format($totalDebit,2) }}

                    </th>

                    <th class="text-end">

                        {{ number_format($totalCredit,2) }}

                    </th>

                </tr>

                </tfoot>

            </table>

        </div>

    </div>

    <div class="mt-3">

        {{ $entries->links() }}

    </div>

</div>

@endsection