@extends('adminlte::page')

@section('title','Hall Details')

@section('content_header')

<x-page-header title="Hall Details" />

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <div class="row">

            <div class="col-md-3 text-center">

                <x-profile-photo :photo="$hall->photo" />

            </div>

            <div class="col-md-9">

                <table class="table table-bordered">

                    <tr>
                        <th width="220">Hall Code</th>
                        <td>{{ $hall->hall_code }}</td>
                    </tr>

                    <tr>
                        <th>Hall Name</th>
                        <td>{{ $hall->name }}</td>
                    </tr>

                    <tr>
                        <th>Capacity</th>
                        <td>{{ $hall->capacity }}</td>
                    </tr>

                    <tr>
                        <th>Rooms</th>
                        <td>{{ $hall->rooms }}</td>
                    </tr>

                    <tr>
                        <th>Rent</th>
                        <td>₹ {{ number_format($hall->rent,2) }}</td>
                    </tr>

                    <tr>
                        <th>Security Deposit</th>
                        <td>₹ {{ number_format($hall->security_deposit,2) }}</td>
                    </tr>

                    <tr>
                        <th>Air Conditioned</th>
                        <td>{{ $hall->ac ? 'Yes' : 'No' }}</td>
                    </tr>

                    <tr>
                        <th>Dining Hall</th>
                        <td>{{ $hall->dining_hall ? 'Yes' : 'No' }}</td>
                    </tr>

                    <tr>
                        <th>Kitchen</th>
                        <td>{{ $hall->kitchen ? 'Yes' : 'No' }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            <x-status-badge :status="$hall->status" />
                        </td>
                    </tr>

                    <tr>
                        <th>Remarks</th>
                        <td>{{ $hall->remarks }}</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

@stop