@extends('layouts.app')

@section('title','New Booking')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between mb-3">

    <h2>
        <i class="fas fa-calendar-check text-success"></i>
        New Booking
    </h2>

    <a href="{{ route('bookings.index') }}"
       class="btn btn-secondary">
        Back
    </a>

</div>

<form method="POST"
      action="{{ route('bookings.store') }}"
      enctype="multipart/form-data">

    @include('bookings._form')

</form>

</div>

@endsection

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const hall = document.getElementById('hall');

    if (!hall) return;

    function calculateBalance() {

        const rent =
    parseFloat(document.getElementById('hall_rent').value) || 0;

        const deposit =
            parseFloat(document.getElementById('security_deposit').value) || 0;

        const advance =
            parseFloat(document.getElementById('advance_amount').value) || 0;

        document.getElementById('balance_amount').value =
          (rent + deposit - advance).toFixed(2);

    }

    hall.addEventListener('change', function () {

        const option = this.options[this.selectedIndex];

        if (!option.value) return;

        document.getElementById('hall_capacity').value =
            option.dataset.capacity || '';

        document.getElementById('hall_dining').value =
            option.dataset.dining || '';

        document.getElementById('hall_rent').value =
            option.dataset.rent || '';

        document.getElementById('hall_deposit').value =
            option.dataset.deposit || '';

        document.getElementById('hall_rent').value =
            option.dataset.rent || 0;

        document.getElementById('security_deposit').value =
            option.dataset.deposit || 0;

        calculateBalance();

    });

document.getElementById('hall_rent')
        ?.addEventListener('input', calculateBalance);

    document.getElementById('security_deposit')
        ?.addEventListener('input', calculateBalance);

    document.getElementById('advance_amount')
        ?.addEventListener('input', calculateBalance);

});

</script>

@endpush