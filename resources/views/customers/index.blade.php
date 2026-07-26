@extends('adminlte::page')

@section('title', 'Customers')

@section('content_header')

<x-page-header
    title="Customer Management"
    createRoute="customers.create"
    buttonText="Add Customer" />

@stop

@section('content')

{{-- Dashboard Cards --}}
<div class="row mb-3">

    <x-dashboard-card
        title="Total Customers"
        :value="$totalCustomers"
        color="primary"
        icon="fas fa-users" />

    <x-dashboard-card
        title="Active Customers"
        :value="$activeCustomers"
        color="success"
        icon="fas fa-user-check" />

    <x-dashboard-card
        title="Inactive Customers"
        :value="$inactiveCustomers"
        color="danger"
        icon="fas fa-user-times" />

    <x-dashboard-card
        title="Joined This Month"
        :value="$newCustomers"
        color="warning"
        icon="fas fa-calendar-plus" />

</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header">

        <x-search-bar
            route="customers.index"
            placeholder="Search Customer..." />

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th width="80">Photo</th>

                    <th>Customer Code</th>

                    <th>Name</th>

                    <th>City</th>

                    <th>Email</th>

                    <th>Mobile</th>

                    <th>Status</th>

                    <th width="170">Action</th>

                </tr>

            </thead>

            <tbody>

            @forelse($customers as $customer)

                <tr>

                    <td>

                        <x-profile-photo :photo="$customer->photo" />

                    </td>

                    <td>{{ $customer->customer_code }}</td>

                    <td>{{ $customer->name }}</td>

                    <td>{{ $customer->city }}</td>

                    <td>{{ $customer->email }}</td>

                    <td>{{ $customer->mobile }}</td>

                    <td>

                        <x-status-badge :status="$customer->status" />

                    </td>

                    <td>

                        <x-action-buttons
                            :view="route('customers.show', $customer)"
                            :edit="route('customers.edit', $customer)"
                            :delete="route('customers.destroy', $customer)" />

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8" class="text-center">

                        No customers found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $customers->links() }}

        </div>

    </div>

</div>

@stop