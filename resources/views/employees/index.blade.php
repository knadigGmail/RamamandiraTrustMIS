@extends('adminlte::page')

@section('title', 'Employees')

@section('content_header')

<x-page-header
    title="Employee Management"
    createRoute="employees.create"
    buttonText="Add Employee" />

@stop

@section('content')

{{-- Dashboard Cards --}}
<div class="row mb-3">

    <x-dashboard-card
        title="Total Employees"
        :value="$totalEmployees"
        color="primary"
        icon="fas fa-users" />

    <x-dashboard-card
        title="Active Employees"
        :value="$activeEmployees"
        color="success"
        icon="fas fa-user-check" />

    <x-dashboard-card
        title="Inactive Employees"
        :value="$inactiveEmployees"
        color="danger"
        icon="fas fa-user-times" />

    <x-dashboard-card
        title="Joined This Month"
        :value="$newEmployees"
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
            route="employees.index"
            placeholder="Search Employee..." />

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped table-hover">

            <thead>

                <tr>

                    <th width="80">Photo</th>

                    <th>Employee Code</th>

                    <th>Name</th>

                    <th>Department</th>

                    <th>Designation</th>

                    <th>Mobile</th>

                    <th>Status</th>

                    <th width="170">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($employees as $employee)

                    <tr>

                        <td>

                            <x-profile-photo :photo="$employee->photo" />

                        </td>

                        <td>{{ $employee->employee_code }}</td>

                        <td>{{ $employee->name }}</td>

                        <td>{{ $employee->department?->name ?? '-' }}</td>

                        <td>{{ $employee->designation ?? '-' }}</td>

                        <td>{{ $employee->mobile ?? '-' }}</td>

                        <td>

                            <x-status-badge :status="$employee->status" />

                        </td>

                        <td>

                            <x-action-buttons
                                :view="route('employees.show', $employee)"
                                :edit="route('employees.edit', $employee)"
                                :delete="route('employees.destroy', $employee)" />

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center text-muted">

                            No employees found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $employees->links() }}

        </div>

    </div>

</div>

@stop