@extends('adminlte::page')

@section('title', 'Edit Booking')

@section('content_header')

<x-page-header title="Edit Booking" />

@stop

@section('content')

<form action="{{ route('bookings.update',$booking) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    @include('bookings._form')

</form>

@stop