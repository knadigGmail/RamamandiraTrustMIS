@extends('layouts.app')

@section('title','Dashboard')

@section('page-title','Dashboard')

@section('content')

<div class="container-fluid">

    <!-- Welcome -->

    <div class="row mb-4">

        <div class="col-md-12">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h3 class="fw-bold mb-1">

                        Welcome, {{ Auth::user()->name }}

                    </h3>

                    <p class="text-muted mb-0">

                        Ramamandira Trust ERP Dashboard

                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- Statistics -->

    <div class="row">

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card stat-card bg-primary text-white shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6>Bookings</h6>

                            <h2>{{ \App\Models\Booking::count() }}</h2>

                        </div>

                        <i class="fas fa-calendar-check fa-3x opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card stat-card bg-success text-white shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6>Donors</h6>

                            <h2>{{ \App\Models\Donor::count() }}</h2>

                        </div>

                        <i class="fas fa-hand-holding-heart fa-3x opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card stat-card bg-warning text-dark shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6>Trustees</h6>

                            <h2>{{ \App\Models\Trustee::count() }}</h2>

                        </div>

                        <i class="fas fa-users fa-3x opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card stat-card bg-danger text-white shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6>Payment Vouchers</h6>

                            <h2>{{ \App\Models\PaymentVoucher::count() }}</h2>

                        </div>

                        <i class="fas fa-file-invoice-dollar fa-3x opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Quick Actions -->

    <div class="row">

        <div class="col-md-6">

            <div class="card shadow-sm">

                <div class="card-header bg-white">

                    <strong>Quick Actions</strong>

                </div>

                <div class="card-body">

                    <div class="d-grid gap-2">

                        <a href="{{ route('bookings.create') }}"
                           class="btn btn-primary">

                            <i class="fas fa-calendar-plus me-2"></i>

                            New Booking

                        </a>

                        <a href="{{ route('donations.create') }}"
                           class="btn btn-success">

                            <i class="fas fa-hand-holding-heart me-2"></i>

                            New Donation

                        </a>

                        <a href="{{ route('payment-vouchers.create') }}"
                           class="btn btn-warning">

                            <i class="fas fa-file-invoice-dollar me-2"></i>

                            Payment Voucher

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- Recent Payment Vouchers -->

        <div class="col-md-6">

            <div class="card shadow-sm">

                <div class="card-header bg-white">

                    <strong>Latest Payment Vouchers</strong>

                </div>

                <div class="card-body p-0">

                    <table class="table table-striped mb-0">

                        <thead>

                        <tr>

                            <th>No</th>

                            <th>Date</th>

                            <th>Amount</th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach(\App\Models\PaymentVoucher::latest()->take(5)->get() as $voucher)

                            <tr>

                                <td>{{ $voucher->voucher_no }}</td>

                                <td>{{ $voucher->voucher_date }}</td>

                                <td>{{ number_format($voucher->amount,2) }}</td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection