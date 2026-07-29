@extends('layouts.app')

@section('title', 'Payment Voucher Register')

@section('content')

<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-0">
                <i class="fas fa-money-check-alt text-warning"></i>
                Payment Voucher Register
            </h2>

            <small class="text-muted">
                Finance / Payment Vouchers
            </small>
        </div>

        <div>

            <a href="{{ route('payment-vouchers.create') }}"
               class="btn btn-warning">

                <i class="fas fa-plus-circle"></i>

                New Voucher

            </a>

        </div>

    </div>

    <!-- Summary Cards -->

    <div class="row">

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">Total Vouchers</h6>

                    <h3 class="fw-bold">
                        {{ $totalVouchers }}
                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="card bg-warning shadow-sm border-0">

                <div class="card-body">

                    <h6>Draft</h6>

                    <h3 class="fw-bold">
                        {{ $draftCount }}
                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="card bg-success text-white shadow-sm border-0">

                <div class="card-body">

                    <h6>Approved</h6>

                    <h3 class="fw-bold">
                        {{ $approvedCount }}
                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="card bg-primary text-white shadow-sm border-0">

                <div class="card-body">

                    <h6>Total Amount</h6>

                    <h3 class="fw-bold">

                        ₹ {{ number_format($totalAmount,2) }}

                    </h3>

                </div>

            </div>

        </div>

    </div>

    <!-- Search Panel -->

    <div class="card shadow-sm mb-4">

        <div class="card-header">

            <strong>

                <i class="fas fa-search"></i>

                Search

            </strong>

        </div>

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-4">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Voucher No / Payee"
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-3">

                        <select
                            name="status"
                            class="form-select">

                            <option value="">All Status</option>

                            <option value="Draft"
                                @selected(request('status')=='Draft')>

                                Draft

                            </option>

                            <option value="Approved"
                                @selected(request('status')=='Approved')>

                                Approved

                            </option>

                            <option value="Cancelled"
                                @selected(request('status')=='Cancelled')>

                                Cancelled

                            </option>

                        </select>

                    </div>

                    <div class="col-md-3">

                        <select
                            name="payment_mode"
                            class="form-select">

                            <option value="">All Modes</option>

                            @foreach(['Cash','Cheque','NEFT','RTGS','UPI'] as $mode)

                                <option value="{{ $mode }}"
                                    @selected(request('payment_mode')==$mode)>

                                    {{ $mode }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-2 d-grid">

                        <button
                            class="btn btn-primary">

                            <i class="fas fa-search"></i>

                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- Register -->

    <div class="card shadow-sm">

        <div class="card-header">

            <strong>

                Payment Voucher List

            </strong>

        </div>

        <div class="card-body p-0">

            <table class="table table-hover table-striped mb-0">

                <thead class="table-dark">

                <tr>

                    <th>Voucher No</th>

                    <th>Date</th>

                    <th>Payee</th>

                    <th>Account Head</th>

                    <th class="text-end">Amount</th>

                    <th>Mode</th>

                    <th>Status</th>

                    <th width="180">Actions</th>

                </tr>

                </thead>

                <tbody>

                @forelse($paymentVouchers as $voucher)

                    <tr>

                        <td>

                            <strong>

                                {{ $voucher->voucher_no }}

                            </strong>

                        </td>

                        <td>

                            {{ $voucher->voucher_date->format('d-m-Y') }}

                        </td>

                        <td>

                            {{ $voucher->payee_name }}

                        </td>

                        <td>

                            {{ $voucher->accountHead->account_name ?? '-' }}

                        </td>

                        <td class="text-end">

                            ₹ {{ number_format($voucher->amount,2) }}

                        </td>

                        <td>

                            {{ $voucher->payment_mode }}

                        </td>

                        <td>

                            @if($voucher->status=='Approved')

                                <span class="badge bg-success">

                                    Approved

                                </span>

                            @elseif($voucher->status=='Cancelled')

                                <span class="badge bg-danger">

                                    Cancelled

                                </span>

                            @else

                                <span class="badge bg-warning text-dark">

                                    Draft

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('payment-vouchers.show',$voucher) }}"
                               class="btn btn-sm btn-info">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{ route('payment-vouchers.edit',$voucher) }}"
                               class="btn btn-sm btn-primary">

                                <i class="fas fa-edit"></i>

                            </a>

                            <a href="{{ route('payment-vouchers.pdf',$voucher) }}"
                               class="btn btn-sm btn-secondary">

                                <i class="fas fa-file-pdf"></i>

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center py-4">

                            No Payment Vouchers Found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">

            {{ $paymentVouchers->links() }}

        </div>

    </div>

</div>

@endsection