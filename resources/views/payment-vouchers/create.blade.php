@extends('adminlte::page')

@section('title','New Payment Voucher')

@section('content')

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            New Payment Voucher

        </h3>

    </div>

    <form method="POST"
          action="{{ route('payment-vouchers.store') }}"
          enctype="multipart/form-data">

        <div class="card-body">

            @include('payment-vouchers._form')

        </div>

    </form>

</div>

@endsection