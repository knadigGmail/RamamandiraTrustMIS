<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Ramamandira ERP')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Font Awesome -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          rel="stylesheet">

</head>

<body class="erp-body">

<div class="wrapper">

    <!-- Sidebar -->

    @include('partials.sidebar')

    <!-- Main Content -->

    <div class="main-content">

        <!-- Navbar -->

        @include('partials.navbar')

        <!-- Page Content -->

        <div class="content-wrapper">

            @include('partials.alerts')

            @yield('content')

        </div>

        <!-- Footer -->

        @include('partials.footer')

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>

</html>