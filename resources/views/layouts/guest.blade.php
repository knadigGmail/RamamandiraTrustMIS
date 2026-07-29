<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HVL Ramamandira Trust MIS</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="card shadow-lg border-0">

                <div class="card-header text-center bg-dark text-white">

                    <img src="{{ asset('images/logo.png') }}"
                         style="height:80px"
                         class="mb-2">

                    <h3 class="mb-0">
                        HVL Ramamandira Trust MIS
                    </h3>

                    <small>
                        Faith, Service and Tradition for Every Generation
                    </small>

                </div>

                <div class="card-body p-4">

                    {{ $slot }}

                </div>

                <div class="card-footer text-center text-muted">

                    © {{ date('Y') }}

                    Ramamandira Trust, Honnavally

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>