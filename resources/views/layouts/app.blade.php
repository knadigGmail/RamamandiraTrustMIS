<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title','Ramamandira Trust ERP')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

</head>

<body>

<div class="wrapper">

    @include('partials.sidebar')

    <div class="main-content">

        @include('partials.navbar')

        <main class="content-wrapper">

            @include('partials.alerts')

            @yield('content')

        </main>

        @include('partials.footer')

    </div>

</div>


@stack('scripts')

</body>

</html>