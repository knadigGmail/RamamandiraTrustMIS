@extends('adminlte::page')

@section('title', 'Donors')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1>Donor Management</h1>

    <a href="{{ route('donors.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Add Donor
    </a>
</div>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="row">

    <div class="col-lg-4">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $totalDonors }}</h3>
                <p>Total Donors</p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-holding-heart"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $activeDonors }}</h3>
                <p>Active Donors</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-check"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $inactiveDonors }}</h3>
                <p>Inactive Donors</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-times"></i>
            </div>
        </div>
    </div>

</div>

<div class="card">

    <div class="card-header">

        <div class="row">

            <div class="col-md-4">
                <form method="GET">
                    <div class="input-group">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search donor...">

                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>

                    </div>
                </form>
            </div>

        </div>

    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">

            <thead>

            <tr>
                <th>Photo</th>
                <th>Code</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Status</th>
                <th width="220">Actions</th>
            </tr>

            </thead>

            <tbody>

            @forelse($donors as $donor)

                <tr>

                    <td width="70">

                        @if($donor->photo)

                            <img src="{{ asset('storage/'.$donor->photo) }}"
                                 width="50"
                                 height="50"
                                 style="border-radius:50%;object-fit:cover;">

                        @else

                            <img src="{{ asset('images/avatar.png') }}"
                                 width="50">

                        @endif

                    </td>

                    <td>{{ $donor->donor_code }}</td>

                    <td>{{ $donor->name }}</td>

                    <td>{{ $donor->mobile }}</td>

                    <td>{{ $donor->city }}</td>

                    <td>

                        @if($donor->status)

                            <span class="badge bg-success">Active</span>

                        @else

                            <span class="badge bg-danger">Inactive</span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('donors.show',$donor) }}"
                           class="btn btn-info btn-sm">
                            View
                        </a>

                        <a href="{{ route('donors.edit',$donor) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('donors.destroy',$donor) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete donor?')">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        No donors found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">
            {{ $donors->links() }}
        </div>

    </div>

</div>

@stop