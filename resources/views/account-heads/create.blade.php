@extends('adminlte::page')

@section('title','New Account Head')

@section('content')

<div class="card">

<div class="card-header">

<h3>Create Account Head</h3>

</div>

<form
action="{{ route('account-heads.store') }}"
method="POST">

@csrf

<div class="card-body">

@include('account-heads._form')

</div>

<div class="card-footer">

<button class="btn btn-success">

Save

</button>

<a href="{{ route('account-heads.index') }}"
class="btn btn-secondary">

Cancel

</a>

</div>

</form>

</div>

@stop