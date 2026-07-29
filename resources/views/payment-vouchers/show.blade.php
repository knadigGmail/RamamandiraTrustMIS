@extends('adminlte::page')

@section('title','Payment Voucher')

@section('content')

<div class="card">

    <div class="card-header">

        <h3>Payment Voucher Details</h3>

    </div>

    <div class="card-body">

        <p><strong>Voucher No:</strong> {{ $paymentVoucher->voucher_no }}</p>

        <p><strong>Payee:</strong> {{ $paymentVoucher->payee_name }}</p>

        <p><strong>Amount:</strong> ₹ {{ number_format($paymentVoucher->amount,2) }}</p>

        <p><strong>Status:</strong> {{ $paymentVoucher->status }}</p>

    </div>

</div>

@endsection