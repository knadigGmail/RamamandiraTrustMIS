@extends('layouts.app')

@section('title','Dashboard')
@section('page-title','Dashboard')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">

        <div class="col-md-12">

            <div class="card shadow-sm">

                <div class="card-body">

                    <h3 class="fw-bold">
                        Welcome, {{ Auth::user()->name }}
                    </h3>

                    <p class="text-muted">
                        Ramamandira Trust ERP Dashboard
                    </p>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-3 mb-4">

            <div class="card stat-card bg-primary text-white">

                <div class="card-body">

                    <h6>Bookings</h6>

                    <h2>{{ $bookings }}</h2>

                </div>

            </div>

        </div>

        <div class="col-lg-3 mb-4">

            <div class="card stat-card bg-success text-white">

                <div class="card-body">

                    <h6>Trustees</h6>

                    <h2>{{ $trustees }}</h2>

                </div>

            </div>

        </div>

        <div class="col-lg-3 mb-4">

            <div class="card stat-card bg-warning">

                <div class="card-body">

                    <h6>Employees</h6>

                    <h2>{{ $employees }}</h2>

                </div>

            </div>

        </div>

        <div class="col-lg-3 mb-4">

            <div class="card stat-card bg-danger text-white">

                <div class="card-body">

                    <h6>Receipt Vouchers</h6>

                    <h2>{{ $receiptVouchers }}</h2>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    Today's Summary
                </div>

                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th>Today's Receipts</th>
                            <td class="text-end">
                                ₹ {{ number_format($todayReceipts,2) }}
                            </td>
                        </tr>

                        <tr>
                            <th>Today's Payments</th>
                            <td class="text-end">
                                ₹ {{ number_format($todayPayments,2) }}
                            </td>
                        </tr>

                        <tr>
                            <th>This Month Receipts</th>
                            <td class="text-end">
                                ₹ {{ number_format($monthReceipts,2) }}
                            </td>
                        </tr>

                        <tr>
                            <th>This Month Payments</th>
                            <td class="text-end">
                                ₹ {{ number_format($monthPayments,2) }}
                            </td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    Recent Receipt Vouchers
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

                        @foreach($recentReceipts as $voucher)

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