@extends('adminlte::page')

@section('title', 'Trust Profile')

@section('content_header')

<x-page-header
    title="Trust Profile"
    buttonText=""
/>

@stop

@section('content')

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<form action="{{ route('settings.update') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="row">

        <!-- LEFT COLUMN -->

        <div class="col-md-8">

            <div class="card">

                <div class="card-header bg-primary text-white">

                    <h5 class="mb-0">
                        <i class="fas fa-building me-2"></i>
                        Trust Information
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label>Trust Name</label>

                            <input
                                type="text"
                                name="trust_name"
                                class="form-control"
                                value="{{ old('trust_name',$setting->trust_name) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Phone</label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="{{ old('phone',$setting->phone) }}">

                        </div>

                    </div>

                    <div class="mb-3">

                        <label>Address</label>

                        <textarea
                            name="address"
                            class="form-control"
                            rows="3">{{ old('address',$setting->address) }}</textarea>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email',$setting->email) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Website</label>

                            <input
                                type="text"
                                name="website"
                                class="form-control"
                                value="{{ old('website',$setting->website) }}">

                        </div>

                    </div>

                </div>

            </div>

            <div class="card mt-3">

                <div class="card-header bg-success text-white">

                    <h5 class="mb-0">
                        <i class="fas fa-receipt me-2"></i>
                        Receipt Settings
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label>Receipt Prefix</label>

                            <input
                                type="text"
                                name="receipt_prefix"
                                class="form-control"
                                value="{{ old('receipt_prefix',$setting->receipt_prefix) }}">

                        </div>

                        <div class="col-md-8 mb-3">

                            <label>WhatsApp Number</label>

                            <input
                                type="text"
                                name="whatsapp_number"
                                class="form-control"
                                value="{{ old('whatsapp_number',$setting->whatsapp_number) }}">

                        </div>

                    </div>

                    <div class="mb-3">

                        <label>Blessing Message</label>

                        <textarea
                            name="blessing_message"
                            rows="3"
                            class="form-control">{{ old('blessing_message',$setting->blessing_message) }}</textarea>

                    </div>

                    <div class="mb-3">

                        <label>Receipt Footer</label>

                        <textarea
                            name="receipt_footer"
                            rows="3"
                            class="form-control">{{ old('receipt_footer',$setting->receipt_footer) }}</textarea>

                    </div>

                </div>

            </div>

            <div class="card mt-3">

                <div class="card-header bg-info text-white">

                    <h5 class="mb-0">
                        <i class="fas fa-university me-2"></i>
                        Bank Details
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label>Bank Name</label>

                            <input
                                type="text"
                                name="bank_name"
                                class="form-control"
                                value="{{ old('bank_name',$setting->bank_name) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Branch</label>

                            <input
                                type="text"
                                name="branch"
                                class="form-control"
                                value="{{ old('branch',$setting->branch) }}">

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label>Account Number</label>

                            <input
                                type="text"
                                name="account_number"
                                class="form-control"
                                value="{{ old('account_number',$setting->account_number) }}">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>IFSC</label>

                            <input
                                type="text"
                                name="ifsc"
                                class="form-control"
                                value="{{ old('ifsc',$setting->ifsc) }}">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>UPI ID</label>

                            <input
                                type="text"
                                name="upi_id"
                                class="form-control"
                                value="{{ old('upi_id',$setting->upi_id) }}">

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT COLUMN -->

        <div class="col-md-4">

            <div class="card">

                <div class="card-header bg-secondary text-white">

                    <h5 class="mb-0">

                        Logo

                    </h5>

                </div>

                <div class="card-body text-center">

                    @if($setting->logo)

                        <img
                            src="{{ asset('storage/'.$setting->logo) }}"
                            class="img-fluid mb-3"
                            style="max-height:180px;">

                    @else

                        <img
                            src="{{ asset('images/logo.png') }}"
                            class="img-fluid mb-3"
                            style="max-height:180px;">

                    @endif

                    <input
                        type="file"
                        name="logo"
                        class="form-control">

                </div>

            </div>

            <button
                class="btn btn-success btn-lg w-100 mt-3">

                <i class="fas fa-save"></i>

                Save Trust Profile

            </button>

        </div>

    </div>

</form>

@stop