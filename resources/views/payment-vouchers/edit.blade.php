@extends('adminlte::page')

@section('title','Edit Payment Voucher')

@section('content')

<div class="card">

    <div class="card-header">

        <h3>Edit Payment Voucher</h3>

    </div>

    <form method="POST"
          action="{{ route('payment-vouchers.update',$paymentVoucher) }}"
          enctype="multipart/form-data">

        @method('PUT')

        <div class="card-body">

            @include('payment-vouchers._form')

        </div>

    </form>

</div>

@endsection