@extends('adminlte::page')

@section('title','Booking Details')

@section('content_header')

<x-page-header title="Booking Details"/>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <h4>{{ $booking->booking_no }}</h4>

        <table class="table table-bordered">

            <tr>
                <th>Customer</th>
                <td>{{ $booking->customer_name }}</td>
            </tr>

            <tr>
                <th>Hall</th>
                <td>{{ $booking->hall_name }}</td>
            </tr>

            <tr>
                <th>Function Date</th>
                <td>{{ $booking->function_date }}</td>
            </tr>

            <tr>
                <th>Hall Charges</th>
                <td>₹ {{ number_format($booking->hall_charges,2) }}</td>
            </tr>

            <tr>
                <th>Advance</th>
                <td>₹ {{ number_format($booking->advance_amount,2) }}</td>
            </tr>

            <tr>
                <th>Balance</th>
                <td>₹ {{ number_format($booking->balance_amount,2) }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>{{ $booking->status }}</td>
            </tr>

        </table>

    </div>

</div>

@stop