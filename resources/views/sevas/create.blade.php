@extends('layouts.app')

@section('title', 'Create Seva')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3>Create Seva</h3>

            <small class="text-muted">
                Add a new Seva
            </small>

        </div>

        <a href="{{ route('sevas.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Back

        </a>

    </div>

    <form action="{{ route('sevas.store') }}"
          method="POST">

        @csrf

        @include('sevas._form')

    </form>

</div>

@endsection