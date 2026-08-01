@extends('adminlte::page')

@section('title','Receipt Vouchers')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h3 class="card-title">
            Receipt Vouchers
        </h3>

        <a href="{{ route('receipt-vouchers.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>

            New Receipt Voucher

        </a>

    </div>

    <div class="card-body">

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        <table class="table table-bordered table-striped">

            <thead>

            <tr>

                <th>Voucher No</th>

                <th>Date</th>

                <th>Received From</th>

                <th>Income Head</th>

                <th>Receipt Account</th>

                <th class="text-end">Amount</th>

                <th>Status</th>

                <th width="240">Action</th>

            </tr>

            </thead>

            <tbody>

            @forelse($receiptVouchers as $voucher)

                <tr>

                    <td>{{ $voucher->voucher_no }}</td>

                    <td>{{ $voucher->voucher_date->format('d-m-Y') }}</td>

                    <td>{{ $voucher->received_from }}</td>

                    <td>{{ $voucher->accountHead?->account_name }}</td>

                    <td>{{ $voucher->financialAccount?->account_name }}</td>

                    <td class="text-end">

                        {{ number_format($voucher->amount,2) }}

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

                            <span class="badge bg-warning">
                                Draft
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('receipt-vouchers.show',$voucher) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <a href="{{ route('receipt-vouchers.edit',$voucher) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <a href="{{ route('receipt-vouchers.pdf',$voucher) }}"
                           class="btn btn-secondary btn-sm">

                            <i class="fas fa-file-pdf"></i>

                        </a>

                        @if($voucher->status!='Approved')

                        <form method="POST"
                              action="{{ route('receipt-vouchers.approve',$voucher) }}"
                              class="d-inline">

                            @csrf

                            <button class="btn btn-success btn-sm">

                                <i class="fas fa-check"></i>

                            </button>

                        </form>

                        @endif

                        <form method="POST"
                              action="{{ route('receipt-vouchers.destroy',$voucher) }}"
                              class="d-inline">

                            @csrf

                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this voucher?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8" class="text-center">

                        No Receipt Vouchers Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $receiptVouchers->links() }}

        </div>

    </div>

</div>

@endsection