@extends('adminlte::page')

@section('title','Edit Account Head')

@section('content')

<div class="card">

<div class="card-header">

<h3>Edit Account Head</h3>

</div>

<form
action="{{ route('account-heads.update',$accountHead) }}"
method="POST">

@csrf

@method('PUT')

<div class="card-body">

@include('account-heads._form')

</div>

<div class="card-footer">

<button class="btn btn-primary">

Update

</button>

<a href="{{ route('account-heads.index') }}"
class="btn btn-secondary">

Cancel

</a>

</div>

</form>

</div>

@stop