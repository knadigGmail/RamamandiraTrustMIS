@extends('adminlte::page')

@section('title', 'Add Customer')

@section('content_header')

<x-page-header
    title="Add Customer" />

@stop

@section('content')

<form action="{{ route('customers.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @include('customers._form')

</form>

@stop