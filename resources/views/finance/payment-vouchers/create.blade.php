@extends('layouts.app')

@section('title', 'Create Payment Voucher')

@section('content')

<div class="container-fluid">

    <div class="row mb-3">

        <div class="col-md-6">
            <h3 class="mb-0">
                <i class="fas fa-money-check-alt"></i>
                Create Payment Voucher
            </h3>

            <small class="text-muted">
                Finance / Payment Voucher / Create
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

        <div class="card-header bg-primary text-white">

            <strong>Payment Voucher Details</strong>

        </div>

        <div class="card-body">

            <form method="POST"
                  action="{{ route('payment-vouchers.store') }}"
                  enctype="multipart/form-data">

                @include('finance.payment-vouchers._form')

            </form>

        </div>

    </div>

</div>

@endsection