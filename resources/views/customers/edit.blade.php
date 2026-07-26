@extends('adminlte::page')

@section('title', 'Edit Customer')

@section('content_header')

<x-page-header
    title="Edit Customer" />

@stop

@section('content')

<form action="{{ route('customers.update',$customer) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    @include('customers._form')

</form>

@stop