@extends('adminlte::page')

@section('title', 'Edit Hall')

@section('content_header')

<x-page-header
    title="Edit Hall" />

@stop

@section('content')

<form action="{{ route('halls.update',$hall) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    @include('halls._form')

</form>

@stop