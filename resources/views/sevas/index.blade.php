@extends('layouts.app')

@section('title','Seva Master')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3>Seva Master</h3>
            <small class="text-muted">
                Manage Temple Sevas
            </small>
        </div>

        <a href="{{ route('sevas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Add Seva
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('sevas.index') }}" class="row mb-3">

        <div class="col-md-4">

            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search..."
                   value="{{ request('search') }}">

        </div>

        <div class="col-md-2">

            <button class="btn btn-primary">

                <i class="fas fa-search"></i>

                Search

            </button>

        </div>

    </form>

    <div class="card shadow-sm">

        <div class="table-responsive">

            <table class="table table-bordered table-hover mb-0">

                <thead class="table-dark">

                <tr>

                    <th>Code</th>
                    <th>Seva Name</th>
                    <th>Category</th>
                    <th>Suggested Amount</th>
                    <th>Status</th>
                    <th width="170">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($sevas as $seva)

                    <tr>

                        <td>{{ $seva->seva_code }}</td>

                        <td>{{ $seva->seva_name }}</td>

                        <td>{{ $seva->category }}</td>

                        <td class="text-end">
                            ₹ {{ number_format($seva->suggested_amount,2) }}
                        </td>

                        <td>

                            @if($seva->is_active)

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('sevas.show',$seva) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{ route('sevas.edit',$seva) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('sevas.destroy',$seva) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this Seva?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            No Sevas Found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3">

        {{ $sevas->links() }}

    </div>

</div>

@endsection