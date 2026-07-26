<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','Honnavalli Ramamandira Trust MIS')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>

<div class="flex min-h-screen">

    @include('partials.sidebar')

    <div class="flex-1 flex flex-col">

        @include('partials.navbar')

        <main class="flex-1 p-6 bg-gray-100">

            @yield('content')

        </main>

        @include('partials.footer')

    </div>

</div>

</body>
</html>