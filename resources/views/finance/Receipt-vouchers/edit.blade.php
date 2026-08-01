@extends('adminlte::page')

@section('title','Edit Receipt Voucher')

@section('content')

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Edit Receipt Voucher

        </h3>

    </div>

    <form method="POST"
          action="{{ route('receipt-vouchers.update',$receiptVoucher) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card-body">

            @include('finance.receipt-vouchers._form')

        </div>

    </form>

</div>

@endsection