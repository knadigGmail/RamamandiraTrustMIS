@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="row align-items-center">

            <div class="col-md-2 text-center">

                @if(isset($settings) && $settings->logo)
                    <img src="{{ asset('storage/'.$settings->logo) }}"
                         style="max-height:90px;">
                @else
                    <img src="{{ asset('images/logo.png') }}"
                         style="max-height:90px;">
                @endif

            </div>

            <div class="col-md-6">

                <h2 class="mb-1 text-bold text-primary">

                    {{ $settings->trust_name ?? 'RAMAMANDIRA TRUST' }}

                </h2>

                <h5 class="text-muted">

                    Honnavally

                </h5>

                <small>

                    Trust Management ERP System

                </small>

            </div>

            <div class="col-md-4 text-end">

                <span class="badge bg-success">

                    Financial Year

                    {{ $settings->financial_year ?? '2026-27' }}

                </span>

                <br><br>

                <strong>

                    {{ now()->format('d M Y') }}

                </strong>

                <br>

                {{ now()->format('l') }}

                <br><br>

                Welcome,

                <strong>{{ Auth::user()->name }}</strong>

            </div>

        </div>

    </div>

</div>

@stop

@section('content')

<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>₹ {{ number_format($todayDonation ?? 0,2) }}</h3>
                <p>Today's Donations</p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-holding-heart"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>₹ {{ number_format($monthDonation ?? 0,2) }}</h3>
                <p>This Month</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-line"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $todayBookings ?? 0 }}</h3>
                <p>Today's Bookings</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-check"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $upcomingBookings ?? 0 }}</h3>
                <p>Upcoming Bookings</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Monthly Donations
                </h3>
            </div>

            <div class="card-body" style="height:300px;">

                <div class="text-center text-muted mt-5">
                    Chart Coming in Sprint 4A.2
                </div>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Monthly Bookings
                </h3>
            </div>

            <div class="card-body" style="height:300px;">

                <div class="text-center text-muted mt-5">
                    Chart Coming in Sprint 4A.2
                </div>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Recent Donations
                </h3>
            </div>

            <div class="card-body">

                Coming in Sprint 4A.3

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Quick Actions
                </h3>
            </div>

            <div class="card-body">

                <a href="{{ route('donations.create') }}" class="btn btn-success mb-2 w-100">
                    New Donation
                </a>

                <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-2 w-100">
                    New Booking
                </a>

                <a href="{{ route('donors.create') }}" class="btn btn-info mb-2 w-100">
                    Add Donor
                </a>

                <a href="{{ route('sevas.create') }}" class="btn btn-warning mb-2 w-100">
                    Add Seva
                </a>

            </div>

        </div>

    </div>

</div>

@stop