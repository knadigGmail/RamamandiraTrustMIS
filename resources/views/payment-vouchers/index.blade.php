@extends('layouts.app')

@section('title','Payment Vouchers')
@section('page-title','Payment Vouchers')

@section('content')

<x-page-header
    title="Payment Vouchers"
    subtitle="Manage payment vouchers"
    buttonText="New Voucher"
    :buttonLink="route('payment-vouchers.create')" />

<div class="row mb-4">

    <div class="col-lg-3 col-md-6 mb-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <small class="text-muted">Total Vouchers</small>

                <h2 class="fw-bold mb-0">
                    {{ $paymentVouchers->total() }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6 mb-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <small class="text-muted">
                    Pending Approval
                </small>

                <h2 class="fw-bold text-warning mb-0">
                    {{ $paymentVouchers->where('status','Pending')->count() }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6 mb-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <small class="text-muted">
                    Approved
                </small>

                <h2 class="fw-bold text-success mb-0">
                    {{ $paymentVouchers->where('status','Approved')->count() }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6 mb-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <small class="text-muted">
                    Cancelled
                </small>

                <h2 class="fw-bold text-danger mb-0">
                    {{ $paymentVouchers->where('status','Cancelled')->count() }}
                </h2>

            </div>

        </div>

    </div>

</div>
<div class="card shadow-sm mb-3">

    <div class="card-header bg-white">
        <strong>
            <i class="fas fa-search"></i>
            Search Payment Vouchers
        </strong>
    </div>

    <div class="card-body">

        <form method="GET"
              action="{{ route('payment-vouchers.index') }}">

            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">
                        Search
                    </label>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Voucher No / Payee / Reference"
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-2">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select">

                        <option value="">All</option>

                        <option value="Pending"
                            @selected(request('status')=='Pending')>
                            Pending
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

                <div class="col-md-2">

                    <label class="form-label">
                        Mode
                    </label>

                    <select
                        name="payment_mode"
                        class="form-select">

                        <option value="">All</option>

                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                        <option value="UPI">UPI</option>
                        <option value="NEFT">NEFT</option>
                        <option value="RTGS">RTGS</option>

                    </select>

                </div>

                <div class="col-md-2">

                    <label class="form-label">
                        From
                    </label>

                    <input
                        type="date"
                        name="from"
                        class="form-control"
                        value="{{ request('from') }}">

                </div>

                <div class="col-md-2">

                    <label class="form-label">
                        To
                    </label>

                    <input
                        type="date"
                        name="to"
                        class="form-control"
                        value="{{ request('to') }}">

                </div>

            </div>

            <div class="mt-3">

                <button
                    class="btn btn-primary">

                    <i class="fas fa-search"></i>
                    Search

                </button>

                <a href="{{ route('payment-vouchers.index') }}"
                   class="btn btn-secondary">

                    Reset

                </a>

            </div>

        </form>

    </div>

</div>
<div class="card shadow-sm">

    <div class="card-header bg-white">

        <strong>Payment Voucher Register</strong>

    </div>

    <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

            <thead class="table-light">

            <tr>

                <th>Voucher No</th>

                <th>Date</th>

                <th>Payee</th>

                <th>Amount</th>

                <th>Status</th>

                <th width="180">Actions</th>

            </tr>

            </thead>

           <tbody>

@forelse($paymentVouchers as $voucher)

<tr>

    <td>
        <strong>{{ $voucher->voucher_no }}</strong>
    </td>

    <td>
        {{ $voucher->voucher_date->format('d-M-Y') }}
    </td>

    <td>

        <strong>{{ $voucher->payee_name }}</strong>

        @if($voucher->reference_no)

            <br>

            <small class="text-muted">

                Ref :
                {{ $voucher->reference_no }}

            </small>

        @endif

    </td>

    <td>

        {{ $voucher->accountHead->account_name }}

    </td>

    <td class="text-end">

        ₹ {{ number_format($voucher->amount,2) }}

    </td>

    <td>

        @switch($voucher->status)

            @case('Approved')

                <span class="badge bg-success">

                    Approved

                </span>

                @break

            @case('Cancelled')

                <span class="badge bg-danger">

                    Cancelled

                </span>

                @break

            @default

                <span class="badge bg-warning text-dark">

                    Pending

                </span>

        @endswitch

    </td>

    <td width="170">

        <div class="btn-group">

            <a href="{{ route('payment-vouchers.show',$voucher) }}"
               class="btn btn-sm btn-info">

                <i class="fas fa-eye"></i>

            </a>

            <a href="{{ route('payment-vouchers.edit',$voucher) }}"
               class="btn btn-sm btn-warning">

                <i class="fas fa-edit"></i>

            </a>

            <a href="{{ route('payment-vouchers.pdf',$voucher) }}"
               class="btn btn-sm btn-secondary"
               target="_blank">

                <i class="fas fa-print"></i>

            </a>

        </div>

    </td>

</tr>

@empty

<tr>

    <td colspan="7"
        class="text-center py-5">

        <i class="fas fa-file-invoice-dollar fa-3x text-secondary mb-3"></i>

        <h5>No Payment Vouchers Found</h5>

        <p class="text-muted">

            Click New Voucher to create your first voucher.

        </p>

    </td>

</tr>

@endforelse

</tbody>

        </table>

    </div>

    <div class="card-footer bg-white">

        {{ $paymentVouchers->links() }}

    </div>

</div>

@endsection