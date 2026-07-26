@extends('adminlte::page')

@section('title', 'Add Hall')

@section('content_header')

<x-page-header
    title="Add Hall" />

@stop

@section('content')

<form action="{{ route('halls.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @include('halls._form')

</form>

@stop