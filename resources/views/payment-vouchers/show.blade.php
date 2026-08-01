@extends('layouts.app')

@section('title','Payment Voucher')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>

            <h2 class="mb-0">
                Payment Voucher
            </h2>

            <small class="text-muted">
                {{ $paymentVoucher->voucher_no }}
            </small>

        </div>

        <div>

            <a href="{{ route('payment-vouchers.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Back

            </a>

            <a href="{{ route('payment-vouchers.edit',$paymentVoucher) }}"
               class="btn btn-warning">

                <i class="fas fa-edit"></i>
                Edit

            </a>

            <a href="{{ route('payment-vouchers.pdf',$paymentVoucher) }}"
               target="_blank"
               class="btn btn-primary">

                <i class="fas fa-print"></i>
                Print

            </a>

        </div>

    </div>

    <div class="card shadow-sm">

        <div class="card-header">

            <strong>Voucher Information</strong>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <table class="table table-borderless">

                        <tr>
                            <th width="180">Voucher No</th>
                            <td>{{ $paymentVoucher->voucher_no }}</td>
                        </tr>

                        <tr>
                            <th>Date</th>
                            <td>{{ $paymentVoucher->voucher_date->format('d-M-Y') }}</td>
                        </tr>

                        <tr>
                            <th>Payee</th>
                            <td>{{ $paymentVoucher->payee_name }}</td>
                        </tr>

                        <tr>
                            <th>Amount</th>
                            <td>
                                <strong>
                                    ₹ {{ number_format($paymentVoucher->amount,2) }}
                                </strong>
                            </td>
                        </tr>

                    </table>

                </div>

                <div class="col-md-6">

                    <table class="table table-borderless">

                        <tr>

                            <th width="180">
                                Payment Mode
                            </th>

                            <td>

                                {{ $paymentVoucher->payment_mode }}

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Account Head
                            </th>

                            <td>

                                {{ optional($paymentVoucher->accountHead)->account_name }}

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Financial Account
                            </th>

                            <td>

                                {{ optional($paymentVoucher->financialAccount)->account_name }}

                            </td>

                        </tr>

                        <tr>

                            <th>Status</th>

                            <td>

                                @if($paymentVoucher->status=='Approved')

                                    <span class="badge bg-success">
                                        Approved
                                    </span>

                                @elseif($paymentVoucher->status=='Cancelled')

                                    <span class="badge bg-danger">
                                        Cancelled
                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                @endif

                            </td>

                        </tr>

                    </table>

                </div>

            </div>
<div class="card shadow-sm mt-3">

    <div class="card-header">

        <strong>Approval Workflow</strong>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <table class="table table-borderless">

                    <tr>

                        <th width="180">
                            Created By
                        </th>

                        <td>

                            {{ optional($paymentVoucher->creator)->name }}

                        </td>

                    </tr>

                    <tr>

                        <th>
                            Approved By
                        </th>

                        <td>

                            {{ optional($paymentVoucher->approver)->name ?? '-' }}

                        </td>

                    </tr>

                    <tr>

                        <th>
                            Approved On
                        </th>

                        <td>

                            {{ optional($paymentVoucher->approved_at)?->format('d-M-Y H:i') ?? '-' }}

                        </td>

                    </tr>

                </table>

            </div>

            <div class="col-md-6 text-end">

                @if($paymentVoucher->status=='Pending')

                    <form method="POST"
                          action="{{ route('payment-vouchers.approve',$paymentVoucher) }}">

                        @csrf

                        <button class="btn btn-success">

                            <i class="fas fa-check"></i>

                            Approve Voucher

                        </button>

                    </form>

                @endif

            </div>

        </div>

    </div>

</div>
            <hr>

            <h5>Narration</h5>

            <p>

                {{ $paymentVoucher->narration ?: 'No narration available.' }}

            </p>

            @if($paymentVoucher->attachment)

                <hr>

                <h5>Attachment</h5>

                <a href="{{ asset('storage/'.$paymentVoucher->attachment) }}"
                   target="_blank"
                   class="btn btn-outline-primary">

                    <i class="fas fa-paperclip"></i>

                    View Attachment

                </a>

            @endif

        </div>

    </div>

</div>

@endsection