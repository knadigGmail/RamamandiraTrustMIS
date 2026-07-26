@extends('adminlte::page')

@section('title', 'Edit Donor')

@section('content_header')
    <h1>Edit Donor</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Edit Donor</h3>
    </div>

    <form method="POST"
          action="{{ route('donors.update',$donor) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card-body">

            @php($buttonText='Update Donor')

            @include('donors._form')

        </div>

    </form>

</div>

@stop