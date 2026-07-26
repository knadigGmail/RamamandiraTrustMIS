@extends('layouts.app')

@section('title', 'Edit Seva')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3>Edit Seva</h3>

            <small class="text-muted">
                Update Seva Details
            </small>

        </div>

        <a href="{{ route('sevas.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Back

        </a>

    </div>

    <form action="{{ route('sevas.update', $seva) }}"
          method="POST">

        @csrf
        @method('PUT')

        @include('sevas._form')

    </form>

</div>

@endsection