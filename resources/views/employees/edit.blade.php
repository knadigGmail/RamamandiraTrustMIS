@extends('adminlte::page')

@section('title', 'Edit Employee')

@section('content_header')
    <h1>Edit Employee</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Employee Details</h3>
    </div>

    <form method="POST"
          action="{{ route('employees.update',$employee) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card-body">

            @php($buttonText='Update Employee')

            @include('employees._form')

        </div>

    </form>

</div>

@stop