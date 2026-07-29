@extends('adminlte::page')

@section('title', 'Chart of Accounts')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Chart of Accounts</h1>

    <a href="{{ route('account-heads.create') }}"
       class="btn btn-primary">
        <i class="fas fa-plus"></i> New Account
    </a>
</div>
@stop

@section('content')

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card">

<div class="card-header">

<form>

<div class="row">

<div class="col-md-4">

<input
    type="text"
    name="search"
    value="{{ request('search') }}"
    class="form-control"
    placeholder="Search...">

</div>

<div class="col-md-2">

<button class="btn btn-primary">

Search

</button>

</div>

</div>

</form>

</div>

<div class="card-body table-responsive">

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Code</th>

<th>Account Name</th>

<th>Type</th>

<th>Parent</th>

<th>Status</th>

<th width="180">Actions</th>

</tr>

</thead>

<tbody>

@forelse($accountHeads as $account)

<tr>

<td>{{ $account->account_code }}</td>

<td>{{ $account->account_name }}</td>

<td>

<span class="badge bg-info">

{{ $account->account_type }}

</span>

</td>

<td>

{{ optional($account->parent)->account_name }}

</td>

<td>

@if($account->is_active)

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

<a href="{{ route('account-heads.edit',$account) }}"
   class="btn btn-warning btn-sm">

Edit

</a>

<form
action="{{ route('account-heads.destroy',$account) }}"
method="POST"
style="display:inline">

@csrf

@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this account?')">

Delete

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="6" class="text-center">

No records found.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

<div class="card-footer">

{{ $accountHeads->links() }}

</div>

</div>

@stop