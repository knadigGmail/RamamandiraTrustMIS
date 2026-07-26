@extends('layouts.app')

@section('title', 'Donation Entry')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3>Donation Entry</h3>

            <small class="text-muted">
                Record a New Donation
            </small>

        </div>

        <a href="{{ route('donations.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Back

        </a>

    </div>

    <form action="{{ route('donations.store') }}"
          method="POST">

        @csrf

        @include('donations._form')

    </form>

</div>

@endsection