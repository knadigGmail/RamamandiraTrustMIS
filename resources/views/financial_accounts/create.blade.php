@extends('layouts.app')

@section('title', 'Create Financial Account')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3>Create Financial Account</h3>
            <small class="text-muted">
                Add a new Bank / Cash / UPI Account
            </small>
        </div>

        <a href="{{ route('financial-accounts.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Back

        </a>

    </div>

    <form action="{{ route('financial-accounts.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @include('financial_accounts._form')

    </form>

</div>

@endsection