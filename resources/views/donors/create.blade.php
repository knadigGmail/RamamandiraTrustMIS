@extends('adminlte::page')

@section('title', 'Add Donor')

@section('content_header')
    <h1>Add Donor</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Donor Details</h3>
    </div>

    <form method="POST"
          action="{{ route('donors.store') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="card-body">

            @php($buttonText='Save Donor')

            @include('donors._form')

        </div>

    </form>

</div>

@stop