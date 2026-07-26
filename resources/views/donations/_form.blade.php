<div class="card shadow-sm">

    <div class="card-header bg-primary text-white">
        Donation Entry
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-3 mb-3">

                <label class="form-label">Receipt No</label>

                <input type="text"
                       name="receipt_no"
                       class="form-control"
                       value="{{ old('receipt_no', $donation->receipt_no ?? $receiptNo ?? '') }}"
                       readonly>

            </div>

            <div class="col-md-3 mb-3">

                <label class="form-label">Receipt Date</label>

                <input type="date"
                       name="receipt_date"
                       class="form-control"
                       value="{{ old('receipt_date', isset($donation) ? $donation->receipt_date->format('Y-m-d') : date('Y-m-d')) }}"
                       required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Donor
                </label>

                <select name="donor_id"
                        class="form-select"
                        required>

                    <option value="">Select Donor</option>

                    @foreach($donors as $donor)

                        <option value="{{ $donor->id }}"
                            {{ old('donor_id', $donation->donor_id ?? '') == $donor->id ? 'selected' : '' }}>

                            {{ $donor->name }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <div class="row">

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Seva
                </label>

               <select name="seva_id"
        id="seva"
        class="form-select"
        required>

                    <option value="">Select Seva</option>

                    @foreach($sevas as $seva)

                       <option value="{{ $seva->id }}"
        data-amount="{{ $seva->suggested_amount }}"
        {{ old('seva_id', $donation->seva_id ?? '') == $seva->id ? 'selected' : '' }}>

    {{ $seva->seva_name }}

</option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Financial Account
                </label>

                <select name="financial_account_id"
                        class="form-select"
                        required>

                    <option value="">Select Account</option>

                    @foreach($accounts as $account)

                        <option value="{{ $account->id }}"
                            {{ old('financial_account_id', $donation->financial_account_id ?? '') == $account->id ? 'selected' : '' }}>

                            {{ $account->account_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Payment Mode
                </label>

                <select name="payment_mode"
                        class="form-select"
                        required>

                    @foreach(['Cash','Bank','UPI','Cheque'] as $mode)

                        <option value="{{ $mode }}"
                            {{ old('payment_mode', $donation->payment_mode ?? '') == $mode ? 'selected' : '' }}>

                            {{ $mode }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <div class="row">

            <div class="col-md-3 mb-3">

    <label class="form-label">
        Amount
    </label>

    <input type="number"
           step="0.01"
           id="amount"
           name="amount"
           class="form-control"
           value="{{ old('amount', $donation->amount ?? '') }}"
           required>

            <div class="col-md-5 mb-3">

                <label class="form-label">
                    Transaction Reference
                </label>

                <input type="text"
                       name="transaction_reference"
                       class="form-control"
                       value="{{ old('transaction_reference', $donation->transaction_reference ?? '') }}">

            </div>

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Remarks
                </label>

                <input type="text"
                       name="remarks"
                       class="form-control"
                       value="{{ old('remarks', $donation->remarks ?? '') }}">

            </div>

        </div>

    </div>

    <div class="card-footer text-end">

        <a href="{{ route('donations.index') }}"
           class="btn btn-secondary">

            Cancel

        </a>

        <button type="submit"
                class="btn btn-success">

            Save Donation

        </button>

    </div>

</div>
<script>

document.addEventListener('DOMContentLoaded', function () {

    const seva = document.getElementById('seva');
    const amount = document.getElementById('amount');

    seva.addEventListener('change', function () {

        const option = this.options[this.selectedIndex];

        if(option.dataset.amount){

            amount.value = option.dataset.amount;

        }

    });

});

</script>