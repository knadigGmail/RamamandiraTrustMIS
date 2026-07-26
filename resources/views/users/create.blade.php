@extends('layouts.app')

@section('title','Create User')

@section('content')

<div class="container-fluid">

    <div class="card card-primary">

        <div class="card-header">

            <h3 class="card-title">
                <i class="fas fa-user-plus"></i>
                Create New User
            </h3>

        </div>

        <form method="POST" action="{{ route('users.store') }}">

            @csrf

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group mb-3">

                            <label>Name</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group mb-3">

                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                required>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group mb-3">

                            <label>Password</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group mb-3">

                            <label>Confirm Password</label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                required>

                        </div>

                    </div>

                </div>

                <div class="form-group mb-3">

                    <label>Role</label>

                    <select
                        name="role"
                        class="form-control">

                        @foreach($roles as $role)

                            <option value="{{ $role->name }}">

                                {{ $role->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="card-footer">

                <button class="btn btn-success">

                    <i class="fas fa-save"></i>

                    Save User

                </button>

                <a href="{{ route('users.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection