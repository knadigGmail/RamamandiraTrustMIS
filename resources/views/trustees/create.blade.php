@extends('adminlte::page')

@section('title', 'Add Trustee')

@section('content_header')
    <h1>Add Trustee</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Trustee Details</h3>
    </div>

    <form method="POST"
          action="{{ route('trustees.store') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="card-body">

            @php($buttonText = 'Save Trustee')

            @include('trustees._form')

        </div>

    </form>

</div>

@stop