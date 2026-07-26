@extends('adminlte::page')

@section('title', 'Trustees')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Trustee Management</h1>

        <a href="{{ route('trustees.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add Trustee
        </a>
    </div>
@stop

@section('content')
<div class="row mb-3">

    <div class="col-md-4">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $totalTrustees }}</h3>
                <p>Total Trustees</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $activeTrustees }}</h3>
                <p>Active Trustees</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-check"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $inactiveTrustees }}</h3>
                <p>Inactive Trustees</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-times"></i>
            </div>
        </div>
    </div>

</div>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Trustees</h3>
    </div>

    <div class="card-body">
<form method="GET" action="{{ route('trustees.index') }}" class="mb-3">

    <div class="input-group">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search by Code, Name, Mobile or Designation"
            value="{{ request('search') }}">

        <button class="btn btn-primary" type="submit">
            <i class="fas fa-search"></i> Search
        </button>

        <a href="{{ route('trustees.index') }}" class="btn btn-secondary">
            Reset
        </a>

    </div>

</form>
        <table class="table table-bordered table-striped">

            <thead>

            <tr>
                <th>Photo</th>
                <th>Code</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Designation</th>
                <th>Status</th>
                <th width="180">Action</th>
            </tr>

            </thead>

            <tbody>

            @forelse($trustees as $trustee)

                <tr>
                <td>

                @if($trustee->photo)

                    <img src="{{ asset('storage/'.$trustee->photo) }}"
                        width="45"
                        height="45"
                        class="rounded-circle border">

                @else

                    <img src="{{ asset('images/avatar.png') }}"
                        width="45"
                        height="45"
                        class="rounded-circle border">

                @endif

                </td>
                    <td>{{ $trustee->trustee_code }}</td>

                    <td>{{ $trustee->name }}</td>

                    <td>{{ $trustee->mobile }}</td>

                    <td>{{ $trustee->designation }}</td>

                    <td>

                        @if($trustee->status == '1')

                            <span class="badge bg-success">Active</span>

                        @else

                            <span class="badge bg-danger">Inactive</span>

                        @endif

                    </td>

               <td style="white-space: nowrap;">

    <a href="{{ route('trustees.show', $trustee) }}"
       class="btn btn-info btn-sm">
        <i class="fas fa-eye"></i> View
    </a>

    <a href="{{ route('trustees.edit', $trustee) }}"
       class="btn btn-warning btn-sm">
        <i class="fas fa-edit"></i> Edit
    </a>

    <form action="{{ route('trustees.destroy', $trustee) }}"
          method="POST"
          class="d-inline">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete this trustee?')">
            <i class="fas fa-trash"></i> Delete
        </button>

    </form>

</td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        No trustees found.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>
<div class="mt-3">
    {{ $trustees->links() }}
</div>
    </div>

</div>

@stop