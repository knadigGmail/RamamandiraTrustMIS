@extends('adminlte::page')

@section('title', 'Halls')

@section('content_header')

<x-page-header
    title="Hall Management"
    createRoute="halls.create"
    buttonText="Add Hall" />

@stop

@section('content')

{{-- Dashboard Cards --}}
<div class="row mb-3">

    <x-dashboard-card
        title="Total Halls"
        :value="$totalHalls"
        color="primary"
        icon="fas fa-building" />

    <x-dashboard-card
        title="Active Halls"
        :value="$activeHalls"
        color="success"
        icon="fas fa-check-circle" />

    <x-dashboard-card
        title="AC Halls"
        :value="$acHalls"
        color="info"
        icon="fas fa-snowflake" />

    <x-dashboard-card
        title="Total Capacity"
        :value="$totalCapacity"
        color="warning"
        icon="fas fa-users" />

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card">

    <div class="card-header">

        <x-search-bar
            route="halls.index"
            placeholder="Search Hall..." />

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

            <tr>

                <th width="80">Photo</th>

                <th>Code</th>

                <th>Hall Name</th>

                <th>Capacity</th>

                <th>Rent</th>

                <th>Facilities</th>

                <th>Status</th>

                <th width="180">Action</th>

            </tr>

            </thead>

            <tbody>

            @forelse($halls as $hall)

                <tr>

                    <td>

                        <x-profile-photo :photo="$hall->photo" />

                    </td>

                    <td>

                        {{ $hall->hall_code }}

                    </td>

                    <td>

                        <strong>{{ $hall->name }}</strong>

                    </td>

                    <td>

                        {{ number_format($hall->capacity) }}

                    </td>

                    <td>

                        ₹ {{ number_format($hall->hall_rent,2) }}

                    </td>

                    <td>

                        @if($hall->ac)
                            <span class="badge bg-info">AC</span>
                        @endif

                        @if($hall->dining_hall)
                            <span class="badge bg-success">Dining</span>
                        @endif

                        @if($hall->kitchen)
                            <span class="badge bg-warning">Kitchen</span>
                        @endif

                    </td>

                    <td>

                        <x-status-badge :status="$hall->status" />

                    </td>

                    <td>

                        <x-action-buttons
                            :view="route('halls.show',$hall)"
                            :edit="route('halls.edit',$hall)"
                            :delete="route('halls.destroy',$hall)" />

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8" class="text-center">

                        No halls found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $halls->links() }}

        </div>

    </div>

</div>

@stop