@extends('adminlte::page')

@section('title', 'Trust Settings')

@section('content')

<div class="card">

    <div class="card-header">

        <h3 class="card-title">
            <i class="fas fa-cog"></i>
            Trust Settings
        </h3>

    </div>

    <form action="{{ route('settings.update') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card-body">

            <ul class="nav nav-tabs">

                <li class="nav-item">
                    <a class="nav-link active"
                       data-toggle="tab"
                       href="#general">
                        General
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       data-toggle="tab"
                       href="#branding">
                        Branding
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       data-toggle="tab"
                       href="#bank">
                        Bank
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       data-toggle="tab"
                       href="#receipt">
                        Receipt
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       data-toggle="tab"
                       href="#system">
                        System
                    </a>
                </li>

            </ul>

            <div class="tab-content pt-3">

                <div class="tab-pane active" id="general">
                    @include('settings._general')
                </div>

                <div class="tab-pane" id="branding">
                    @include('settings._branding')
                </div>

                <div class="tab-pane" id="bank">
                    @include('settings._bank')
                </div>

                <div class="tab-pane" id="receipt">
                    @include('settings._receipt')
                </div>

                <div class="tab-pane" id="system">
                    @include('settings._system')
                </div>

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-success">

                <i class="fas fa-save"></i>

                Save Settings

            </button>

        </div>

    </form>

</div>

@endsection