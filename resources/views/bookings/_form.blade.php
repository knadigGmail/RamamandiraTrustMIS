@csrf

<div class="card card-primary">

    <div class="card-header">

        <h3 class="card-title">
            <i class="fas fa-calendar-check"></i>
            Booking Information
        </h3>

    </div>

    <div class="card-body">

        {{-- ========================= --}}
        {{-- Booking Information --}}
        {{-- ========================= --}}

        <div class="row">

            <div class="col-md-3">

                <div class="form-group">

                    <label>
                        Booking No
                    </label>

                    <input
    type="text"
    name="booking_no"
    class="form-control"
    value="{{ old('booking_no', $booking->booking_no ?? $bookingNo ?? '') }}"
    readonly>

<input
    type="hidden"
    name="booking_no"
    value="{{ old('booking_no', $booking->booking_no ?? $bookingNo ?? '') }}">

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>
                        Booking Date
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="date"
                        name="booking_date"
                        class="form-control @error('booking_date') is-invalid @enderror"
                        value="{{ old('booking_date',date('Y-m-d')) }}">

                    @error('booking_date')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror

                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group">

                    <label>
                        Customer
                        <span class="text-danger">*</span>
                    </label>

                    <select
    name="customer_id"
    class="form-control @error('customer_id') is-invalid @enderror">

                        <option value="">
                            Select Customer
                        </option>

                        @foreach($customers as $customer)

                           <option
    value="{{ $customer->id }}"
    @selected(old('customer_id', $booking->customer_id ?? '') == $customer->id)>

                                {{ $customer->customer_code }}
                                -
                                {{ $customer->name }}

                            </option>

                        @endforeach

                    </select>

                    @error('customer_id')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-4">

                <div class="form-group">

                    <label>
                        Hall
                        <span class="text-danger">*</span>
                    </label>

                    <select
                        id="hall"
                        name="hall_id"
                        class="form-control @error('hall_id') is-invalid @enderror">

                        <option value="">
                            Select Hall
                        </option>

                        @foreach($halls as $hall)

                           <option
    value="{{ $hall->id }}"
    data-capacity="{{ $hall->capacity }}"
    data-dining="{{ $hall->dining_capacity }}"
    data-rent="{{ $hall->hall_rent }}"
    data-deposit="{{ $hall->security_deposit }}"
    @selected(old('hall_id', $booking->hall_id ?? '') == $hall->id)>
    {{ $hall->display_name }}
</option>
                        @endforeach

                    </select>
<div id="hallAvailability" class="mt-3"></div>                    @error('hall_id')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror

                </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">

                    <label>
                        Function Type
                    </label>

                    <select
                        name="function_type"
                        class="form-control">

                        <option>Marriage</option>
                        <option>Reception</option>
                        <option>Upanayana</option>
                        <option>Seemantha</option>
                        <option>Birthday</option>
                        <option>Religious Function</option>
                        <option>Meeting</option>
                        <option>Other</option>

                    </select>

                </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">

                    <label>
                        Function Date
                    </label>

                    <input
                        type="date"
                        name="function_date"
                        class="form-control"
                        value="{{ old('function_date') }}">

                </div>

            </div>

        </div>

        <hr>

        <h5 class="text-primary mb-3">

            <i class="fas fa-building"></i>

            Selected Hall Information

        </h5>

        <div class="row">

            <div class="col-md-3">

                <div class="form-group">

                    <label>
                        Hall Capacity
                    </label>

                    <input
                        id="hall_capacity"
                        type="text"
                        class="form-control"
                        readonly>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>
                        Dining Capacity
                    </label>

                    <input
                        id="hall_dining"
                        type="text"
                        class="form-control"
                        readonly>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>
                        Hall Rent
                    </label>

                    <input
                        id="hall_rent"
                        type="text"
                        class="form-control"
                        readonly>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>
                        Security Deposit
                    </label>

                    <input
                        id="hall_deposit"
                        type="text"
                        class="form-control"
                        readonly>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-3">

                <div class="form-group">

                    <label>
                        Guest Count
                    </label>

                    <input
                        type="number"
                        name="guest_count"
                        class="form-control"
                        value="{{ old('guest_count') }}">

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>
                        Rooms Required
                    </label>

                    <input
                        type="number"
                        name="rooms_required"
                        class="form-control"
                        value="{{ old('rooms_required') }}">

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>
                        Check In
                    </label>

                    <input
                        type="datetime-local"
                        name="checkin_datetime"
                        class="form-control">

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>
                        Check Out
                    </label>

                    <input
                        type="datetime-local"
                        name="checkout_datetime"
                        class="form-control">

                </div>

            </div>

        </div>

        <hr>

        <h5 class="text-success mb-3">
            <i class="fas fa-rupee-sign"></i>
            Charges
        </h5>

        <div class="row">

    <div class="col-md-3">

        <div class="form-group">

           <label>
    Hall Rent
    <span class="text-danger">*</span>
</label>
            <input
                type="number"
                step="0.01"
               id="hall_rent_input"
name="hall_rent"
                class="form-control @error('hall_rent') is-invalid @enderror"
                value="{{ old('hall_rent',0) }}">

          @error('hall_rent')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror

        </div>

    </div>

    <div class="col-md-3">

        <div class="form-group">

            <label>
                Security Deposit
            </label>

            <input
                type="number"
                step="0.01"
                id="security_deposit"
                name="security_deposit"
                class="form-control"
                value="{{ old('security_deposit',0) }}">

        </div>

    </div>

    <div class="col-md-3">

        <div class="form-group">

            <label>
                Advance Amount
            </label>

            <input
                type="number"
                step="0.01"
                id="advance_amount"
                name="advance_amount"
                class="form-control"
                value="{{ old('advance_amount',0) }}">

        </div>

    </div>

    <div class="col-md-3">

        <div class="form-group">

            <label>
                Balance Amount
            </label>

            <input
                type="number"
                step="0.01"
                id="balance_amount"
                name="balance_amount"
                class="form-control bg-light"
                readonly>

        </div>

    </div>

</div>

<hr>

<h5 class="text-info mb-3">

    <i class="fas fa-paperclip"></i>

    Documents

</h5>

<div class="row">

    <div class="col-md-4">

        <div class="form-group">

            <label>
                Customer Photo
            </label>

            <input
                type="file"
                name="customer_photo"
                class="form-control">

        </div>

    </div>

    <div class="col-md-4">

        <div class="form-group">

            <label>
                Aadhaar Copy
            </label>

            <input
                type="file"
                name="aadhaar_copy"
                class="form-control">

        </div>

    </div>

    <div class="col-md-4">

        <div class="form-group">

            <label>
                Agreement Copy
            </label>

            <input
                type="file"
                name="agreement_copy"
                class="form-control">

        </div>

    </div>

</div>

<hr>

<div class="form-group">

    <label>
        Remarks
    </label>

    <textarea
        name="remarks"
        rows="5"
        class="form-control">{{ old('remarks') }}</textarea>

</div>

</div>

<div class="card-footer">

    <button
    id="saveBooking"
    type="submit"
    class="btn btn-success">

        <i class="fas fa-save"></i>

        Save Booking

    </button>

    <a
        href="{{ route('bookings.index') }}"
        class="btn btn-secondary">

        <i class="fas fa-times"></i>

        Cancel

    </a>

</div>

</div>
@push('scripts')
<script>

document.addEventListener('DOMContentLoaded', function () {

    const hall = document.getElementById('hall');

    const hallCapacity = document.getElementById('hall_capacity');
    const hallDining = document.getElementById('hall_dining');
    const hallRent = document.getElementById('hall_rent');
    const hallDeposit = document.getElementById('hall_deposit');

const hallRentInput = document.getElementById('hall_rent_input');
    const securityDeposit = document.getElementById('security_deposit');
    const advanceAmount = document.getElementById('advance_amount');
    const balanceAmount = document.getElementById('balance_amount');
const hallAvailability = document.getElementById('hallAvailability');
const functionDate = document.querySelector('input[name="function_date"]');
const saveButton = document.getElementById('saveBooking');    
function money(value) {

        return parseFloat(value || 0).toFixed(2);

    }

    function calculateBalance() {

        let rent = parseFloat(hallRentInput.value || 0);
        let deposit = parseFloat(securityDeposit.value || 0);
        let advance = parseFloat(advanceAmount.value || 0);

        balanceAmount.value = money(
            rent + deposit - advance
        );

    }
async function checkHallAvailability() {

    if (!hall.value || !functionDate.value) {

        hallAvailability.innerHTML = '';
        return;
    }

    const response = await fetch(
        `/api/bookings/check-availability?hall_id=${hall.value}&function_date=${functionDate.value}`
    );

    const data = await response.json();

   if (data.available) {

    hallAvailability.innerHTML = `
        <div class="alert alert-success mt-2">
            <i class="fas fa-check-circle"></i>
            <strong>${data.message}</strong>
        </div>
    `;

    saveButton.disabled = false;

} else {

    hallAvailability.innerHTML = `
        <div class="alert alert-danger mt-2">
            <h6><i class="fas fa-times-circle"></i> Hall Already Booked</h6>

            <table class="table table-sm table-borderless mb-0">
                <tr>
                    <th width="130">Booking No</th>
                    <td>${data.booking_no}</td>
                </tr>
                <tr>
                    <th>Customer</th>
                    <td>${data.customer_name}</td>
                </tr>
                <tr>
                    <th>Function</th>
                    <td>${data.function_type}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>${data.function_date}</td>
                </tr>
            </table>
        </div>
    `;

    saveButton.disabled = true;

}
}
    function loadHallInformation() {

        let option = hall.options[hall.selectedIndex];

        if (!option || option.value === '') {

            hallCapacity.value = '';
            hallDining.value = '';
            hallRent.value = '';
            hallDeposit.value = '';

            hallRentInput.value = '';
            securityDeposit.value = '';

            calculateBalance();

            return;
        }

        hallCapacity.value = option.dataset.capacity;
        hallDining.value = option.dataset.dining;

        hallRent.value = money(option.dataset.rent);
        hallDeposit.value = money(option.dataset.deposit);

        hallRentInput.value = money(option.dataset.rent);
        securityDeposit.value = money(option.dataset.deposit);

        calculateBalance();

    }

hall.addEventListener('change', function () {

    loadHallInformation();
    checkHallAvailability();

});
hallRentInput.addEventListener('keyup', calculateBalance);
hallRentInput.addEventListener('change', calculateBalance);
    securityDeposit.addEventListener('keyup', calculateBalance);
    securityDeposit.addEventListener('change', calculateBalance);

    advanceAmount.addEventListener('keyup', calculateBalance);
    advanceAmount.addEventListener('change', calculateBalance);

    loadHallInformation();
functionDate.addEventListener('change', checkHallAvailability);
});

</script>
@endpush