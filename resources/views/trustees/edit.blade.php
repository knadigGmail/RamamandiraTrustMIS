@extends('adminlte::page')

@section('title', 'Edit Trustee')

@section('content_header')
    <h1>Edit Trustee</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Edit Trustee Details</h3>
    </div>

    <form method="POST"
          action="{{ route('trustees.update', $trustee) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card-body">

            @php($buttonText = 'Update Trustee')

            @include('trustees._form')

        </div>

    </form>

</div>

@stop