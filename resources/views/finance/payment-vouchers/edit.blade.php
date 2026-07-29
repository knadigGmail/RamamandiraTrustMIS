@extends('layouts.app')

@section('title', 'Edit Payment Voucher')

@section('content')

<div class="container-fluid">

    <div class="row mb-3">

        <div class="col-md-6">

            <h3 class="mb-0">

                <i class="fas fa-edit"></i>

                Edit Payment Voucher

            </h3>

            <small class="text-muted">

                {{ $paymentVoucher->voucher_no }}

            </small>

        </div>

        <div class="col-md-6 text-end">

            <a href="{{ route('payment-vouchers.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Back

            </a>

        </div>

    </div>

    <div class="card shadow-sm">

        <div class="card-header bg-warning">

            <strong>Edit Voucher</strong>

        </div>

        <div class="card-body">

            <form method="POST"
                  action="{{ route('payment-vouchers.update', $paymentVoucher) }}"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('finance.payment-vouchers._form')

            </form>

        </div>

    </div>

</div>

@endsection