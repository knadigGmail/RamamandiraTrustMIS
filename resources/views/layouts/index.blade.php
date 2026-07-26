@extends('layouts.admin')

@section('content')

<h2 class="text-3xl font-bold mb-6">

Dashboard

</h2>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white rounded shadow p-6">

        <h3 class="text-gray-500">

Today's Bookings

</h3>

        <p class="text-4xl font-bold">

0

</p>

    </div>

    <div class="bg-white rounded shadow p-6">

        <h3 class="text-gray-500">

Today's Donations

</h3>

        <p class="text-4xl font-bold">

₹0

</p>

    </div>

    <div class="bg-white rounded shadow p-6">

        <h3 class="text-gray-500">

Bank Balance

</h3>

        <p class="text-4xl font-bold">

₹0

</p>

    </div>

</div>

@endsection