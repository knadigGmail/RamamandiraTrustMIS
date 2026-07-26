@extends('layouts.app')

@section('title', 'Edit Financial Account')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3>Edit Financial Account</h3>
            <small class="text-muted">
                Update Financial Account Details
            </small>
        </div>

        <a href="{{ route('financial-accounts.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Back

        </a>

    </div>

    <form action="{{ route('financial-accounts.update', $financialAccount) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('financial_accounts._form')

    </form>

</div>

@endsection