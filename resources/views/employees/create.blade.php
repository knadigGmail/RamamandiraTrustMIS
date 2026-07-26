@extends('adminlte::page')

@section('title', 'Add Employee')

@section('content_header')
    <h1>Add Employee</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Employee Details</h3>
    </div>

    <form method="POST"
          action="{{ route('employees.store') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="card-body">

            @php($buttonText='Save Employee')

            @include('employees._form')

        </div>

    </form>

</div>

@stop