@extends('adminlte::page')

@section('title', 'Bookings')

@section('content_header')

<x-page-header
    title="Booking Management"
    createRoute="bookings.create"
    buttonText="New Booking"/>

@stop

@section('content')

<div class="row">

    <x-dashboard-card
        title="Total Bookings"
        :value="$totalBookings"
        color="primary"
        icon="fas fa-calendar-check"/>

    <x-dashboard-card
        title="Today's Bookings"
        :value="$todayBookings"
        color="success"
        icon="fas fa-calendar-day"/>

    <x-dashboard-card
        title="Upcoming"
        :value="$upcomingBookings"
        color="warning"
        icon="fas fa-clock"/>

    <x-dashboard-card
        title="Cancelled"
        :value="$cancelledBookings"
        color="danger"
        icon="fas fa-times-circle"/>

</div>

<div class="card">

    <div class="card-header">

        <form method="GET">

            <div class="input-group">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search Booking..."
                    value="{{ request('search') }}">

                <button class="btn btn-primary">

                    <i class="fas fa-search"></i>

                </button>

            </div>

        </form>

    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">

            <thead>

            <tr>

                <th>Booking No</th>
                <th>Customer</th>
                <th>Hall</th>
                <th>Function Date</th>
                <th>Charges</th>
                <th>Status</th>
                <th width="130">Action</th>

            </tr>

            </thead>

            <tbody>

            @forelse($bookings as $booking)

                <tr>

                    <td>{{ $booking->booking_no }}</td>

                   <td>{{ $booking->customer?->name }}</td>

                    <td>{{ $booking->hall?->name }}</td>
                    <td>{{ optional($booking->function_date)->format('d-m-Y') }}</td>

                    <td>
                        ₹ {{ number_format($booking->total_amount,2) }}
                    </td>

                    <td>

                       @if($booking->status == \App\Models\Booking::STATUS_CONFIRMED)

<span class="badge bg-success">
    Confirmed
</span>

@elseif($booking->status == \App\Models\Booking::STATUS_TENTATIVE)

<span class="badge bg-warning">
    Tentative
</span>

@elseif($booking->status == \App\Models\Booking::STATUS_CANCELLED)

<span class="badge bg-danger">
    Cancelled
</span>

@elseif($booking->status == \App\Models\Booking::STATUS_COMPLETED)

<span class="badge bg-secondary">
    Completed
</span>

@endif

                    </td>

                    <td>

                        @include('components.action-buttons',[
                            'view'=>route('bookings.show',$booking),
                            'edit'=>route('bookings.edit',$booking),
                            'delete'=>route('bookings.destroy',$booking)
                        ])

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        No Bookings Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="card-footer">

        {{ $bookings->links() }}

    </div>

</div>

@stop