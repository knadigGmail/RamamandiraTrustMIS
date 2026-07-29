@extends('adminlte::page')

@section('title', 'Payment Vouchers')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h3 class="card-title">
            Payment Vouchers
        </h3>

        <a href="{{ route('payment-vouchers.create') }}"
           class="btn btn-success">

            <i class="fas fa-plus"></i>

            New Voucher

        </a>

    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">

            <thead class="table-light">

            <tr>

                <th>Voucher No</th>

                <th>Date</th>

                <th>Payee</th>

                <th>Expense Head</th>

                <th>Amount</th>

                <th>Status</th>

                <th width="220">Actions</th>

            </tr>

            </thead>

            <tbody>

            @forelse($paymentVouchers as $voucher)

                <tr>

                    <td>{{ $voucher->voucher_no }}</td>

                    <td>{{ $voucher->voucher_date->format('d-m-Y') }}</td>

                    <td>{{ $voucher->payee_name }}</td>

                    <td>{{ $voucher->accountHead->account_name ?? '-' }}</td>

                    <td class="text-end">
                        ₹ {{ number_format($voucher->amount,2) }}
                    </td>

                    <td>

                        @if($voucher->status=='Approved')

                            <span class="badge bg-success">
                                Approved
                            </span>

                        @elseif($voucher->status=='Draft')

                            <span class="badge bg-warning">
                                Draft
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Cancelled
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('payment-vouchers.show',$voucher) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <a href="{{ route('payment-vouchers.edit',$voucher) }}"
                           class="btn btn-primary btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <a href="{{ route('payment-vouchers.pdf',$voucher) }}"
                           class="btn btn-danger btn-sm">

                            <i class="fas fa-file-pdf"></i>

                        </a>

                        @if($voucher->status!='Approved')

                        <form
                            action="{{ route('payment-vouchers.approve',$voucher) }}"
                            method="POST"
                            style="display:inline">

                            @csrf

                            <button class="btn btn-success btn-sm">

                                <i class="fas fa-check"></i>

                            </button>

                        </form>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        No Payment Vouchers Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $paymentVouchers->links() }}

        </div>

    </div>

</div>

@endsection