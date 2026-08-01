@extends('adminlte::page')

@section('title','New Receipt Voucher')

@section('content')

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            New Receipt Voucher

        </h3>

    </div>

    <form method="POST"
          action="{{ route('receipt-vouchers.store') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="card-body">

            @include('finance.receipt-vouchers._form')

        </div>

    </form>

</div>

@endsection