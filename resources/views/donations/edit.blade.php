@extends('layouts.app')

@section('title', 'Edit Donation')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3>Edit Donation</h3>

            <small class="text-muted">
                Update Donation Details
            </small>

        </div>

        <a href="{{ route('donations.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Back

        </a>

    </div>

    <form action="{{ route('donations.update', $donation) }}"
          method="POST">

        @csrf
        @method('PUT')

        @include('donations._form')

    </form>

</div>

@endsection