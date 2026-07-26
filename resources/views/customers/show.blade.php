@extends('adminlte::page')

@section('title','Customer Profile')

@section('content_header')

<div class="d-flex justify-content-between">

    <h1>
        <i class="fas fa-user-circle"></i>
        Customer Profile
    </h1>

    <div>

        <a href="{{ route('customers.edit',$customer) }}"
           class="btn btn-warning">

            <i class="fas fa-edit"></i>
            Edit

        </a>

        <a href="{{ route('customers.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Back

        </a>

    </div>

</div>

@stop

@section('content')

<div class="row">

    {{-- Left Panel --}}
    <div class="col-md-4">

        <div class="card card-primary card-outline">

            <div class="card-body text-center">

                @if($customer->photo)

                    <img src="{{ asset('storage/'.$customer->photo) }}"
                         class="profile-user-img img-fluid img-circle">

                @else

                    <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&size=220"
                         class="profile-user-img img-fluid img-circle">

                @endif

                <h3 class="profile-username">

                    {{ $customer->name }}

                </h3>

                <p class="text-muted">

                    {{ $customer->customer_code }}

                </p>

                @if($customer->status)

                    <span class="badge bg-success">
                        Active
                    </span>

                @else

                    <span class="badge bg-danger">
                        Inactive
                    </span>

                @endif

            </div>

        </div>

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    Quick Statistics

                </h3>

            </div>

            <div class="card-body">

                <table class="table table-sm">

                    <tr>
                        <th>Total Bookings</th>
                        <td>{{ $customer->bookings->count() }}</td>
                    </tr>

                    <tr>
                        <th>Total Receipts</th>
                        <td>Coming Soon</td>
                    </tr>

                    <tr>
                        <th>Total Donations</th>
                        <td>Coming Soon</td>
                    </tr>

                    <tr>
                        <th>Outstanding</th>
                        <td>Coming Soon</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

    {{-- Right Panel --}}

    <div class="col-md-8">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    Personal Information

                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">

                        <strong>Mobile</strong>

                        <p>{{ $customer->mobile ?: '-' }}</p>

                    </div>

                    <div class="col-md-6">

                        <strong>Email</strong>

                        <p>{{ $customer->email ?: '-' }}</p>

                    </div>

                    <div class="col-md-6">

                        <strong>Father / Spouse</strong>

                        <p>{{ $customer->father_spouse_name ?: '-' }}</p>

                    </div>

                    <div class="col-md-6">

                        <strong>Gender</strong>

                        <p>{{ $customer->gender ?: '-' }}</p>

                    </div>

                    <div class="col-md-12">

                        <strong>Address</strong>

                        <p>{{ $customer->address }}</p>

                    </div>

                    <div class="col-md-4">

                        <strong>City</strong>

                        <p>{{ $customer->city ?: '-' }}</p>

                    </div>

                    <div class="col-md-4">

                        <strong>State</strong>

                        <p>{{ $customer->state ?: '-' }}</p>

                    </div>

                    <div class="col-md-4">

                        <strong>Pincode</strong>

                        <p>{{ $customer->pincode ?: '-' }}</p>

                    </div>

                    <div class="col-md-6">

                        <strong>Aadhaar</strong>

                        <p>{{ $customer->aadhaar_no ?: '-' }}</p>

                    </div>

                    <div class="col-md-6">

                        <strong>PAN</strong>

                        <p>{{ $customer->pan_no ?: '-' }}</p>

                    </div>

                    <div class="col-md-6">

                        <strong>Gotra</strong>

                        <p>{{ $customer->gotra ?: '-' }}</p>

                    </div>

                    <div class="col-md-6">

                        <strong>Family Name</strong>

                        <p>{{ $customer->family_name ?: '-' }}</p>

                    </div>

                    <div class="col-md-12">

                        <strong>Remarks</strong>

                        <p>{{ $customer->remarks ?: '-' }}</p>

                    </div>

                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    Booking History

                </h3>

            </div>

            <div class="card-body">

                @if($customer->bookings->count())

                <table class="table table-striped">

                    <thead>

                    <tr>

                        <th>Booking No</th>
                        <th>Date</th>
                        <th>Hall</th>
                        <th>Status</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($customer->bookings as $booking)

                    <tr>

                        <td>{{ $booking->booking_no }}</td>

                        <td>{{ $booking->function_date }}</td>

                        <td>{{ optional($booking->hall)->display_name }}</td>

                        <td>{{ $booking->status }}</td>

                    </tr>

                    @endforeach

                    </tbody>

                </table>

                @else

                <div class="alert alert-info">

                    No bookings available.

                </div>

                @endif

            </div>

        </div>

    </div>

</div>

@stop