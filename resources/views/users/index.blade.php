@extends('layouts.app')

@section('title','Users')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between mb-3">

    <h2>
        <i class="fas fa-users"></i>
        User Management
    </h2>

    <a href="{{ route('users.create') }}"
       class="btn btn-primary">

        <i class="fas fa-plus"></i>

        New User

    </a>

</div>
<div class="row mb-3">

    <div class="col-md-3">

        <div class="small-box bg-primary">

            <div class="inner">

                <h3>{{ $totalUsers }}</h3>

                <p>Total Users</p>

            </div>

            <div class="icon">

                <i class="fas fa-users"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ $activeUsers }}</h3>

                <p>Active Users</p>

            </div>

            <div class="icon">

                <i class="fas fa-user-check"></i>

            </div>

        </div>

    </div>

</div>
<div class="card">

<div class="card-body">

<form>

<div class="row mb-3">

<div class="col-md-4">

<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Search..."
class="form-control">

</div>

<div class="col-md-2">

<button class="btn btn-success">

Search

</button>

</div>

</div>

</form>

<table class="table table-bordered table-hover">

<thead>

<tr>

<th>#</th>

<th>Name</th>

<th>Email</th>

<th>Role</th>
<th>Status</th>
<th>Actions</th>

</tr>

</thead>

<tbody>

@forelse($users as $user)

<tr>

<td>{{ $user->id }}</td>

<td>{{ $user->name }}</td>

<td>{{ $user->email }}</td>

<td>

@if($user->getRoleNames()->count())

<span class="badge bg-primary">

    {{ $user->getRoleNames()->first() }}

</span>

@else

<span class="badge bg-secondary">

    No Role

</span>

@endif

</td>
<td>

<span class="badge bg-success">

    Active

</span>

</td>
<td>

<a href="{{ route('users.edit',$user) }}"
   class="btn btn-warning btn-sm">

    <i class="fas fa-edit"></i>

</a>

<button
    class="btn btn-info btn-sm"
    disabled>

    <i class="fas fa-key"></i>

</button>

<button
    class="btn btn-danger btn-sm"
    disabled>

    <i class="fas fa-trash"></i>

</button>

</td>

</tr>

@empty

<tr>

<td colspan="5">

No users found.

</td>

</tr>

@endforelse

</tbody>

</table>

{{ $users->links() }}

</div>

</div>

</div>

@endsection