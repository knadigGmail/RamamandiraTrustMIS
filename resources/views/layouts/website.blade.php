<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Ramamandira Trust')</title>

    <meta name="description" content="Ramamandira Trust - Faith, Service and Tradition for Every Generation">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="website-body">

    <x-navigation />

    <main>
        @yield('content')
    </main>

    <x-footer />

</body>
</html>