@csrf

<div class="row">

    <div class="col-md-4 mb-3">
        <label class="form-label">Voucher Date <span class="text-danger">*</span></label>

        <input
            type="date"
            name="voucher_date"
            class="form-control @error('voucher_date') is-invalid @enderror"
            value="{{ old('voucher_date', isset($paymentVoucher) ? $paymentVoucher->voucher_date?->format('Y-m-d') : date('Y-m-d')) }}">

        @error('voucher_date')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Payment Mode</label>

        <select
            name="payment_mode"
            class="form-select">

            @foreach(['Cash','Cheque','NEFT','RTGS','UPI'] as $mode)

                <option
                    value="{{ $mode }}"
                    @selected(old('payment_mode', $paymentVoucher->payment_mode ?? '') == $mode)>
                    {{ $mode }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Reference No</label>

        <input
            type="text"
            name="reference_no"
            class="form-control"
            value="{{ old('reference_no', $paymentVoucher->reference_no ?? '') }}">
    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">Payee Name</label>

        <input
            type="text"
            name="payee_name"
            class="form-control"
            value="{{ old('payee_name', $paymentVoucher->payee_name ?? '') }}">

    </div>

    <div class="col-md-3 mb-3">

        <label class="form-label">Account Head</label>

        <select
            name="account_head_id"
            class="form-select">

            @foreach($accountHeads as $head)

                <option
                    value="{{ $head->id }}"
                    @selected(old('account_head_id', $paymentVoucher->account_head_id ?? '')==$head->id)>
                    {{ $head->account_name }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="col-md-3 mb-3">

        <label class="form-label">Financial Account</label>

        <select
            name="financial_account_id"
            class="form-select">

            @foreach($financialAccounts as $account)

                <option
                    value="{{ $account->id }}"
                    @selected(old('financial_account_id', $paymentVoucher->financial_account_id ?? '')==$account->id)>
                    {{ $account->account_name }}
                </option>

            @endforeach

        </select>

    </div>

</div>

<div class="row">

    <div class="col-md-4">

        <label class="form-label">Amount</label>

        <input
            type="number"
            step="0.01"
            name="amount"
            class="form-control"
            value="{{ old('amount', $paymentVoucher->amount ?? '') }}">

    </div>

    <div class="col-md-8">

        <label class="form-label">Attachment</label>

        <input
            type="file"
            name="attachment"
            class="form-control">

    </div>

</div>

<div class="mt-3">

    <label class="form-label">Narration</label>

    <textarea
        name="narration"
        rows="4"
        class="form-control">{{ old('narration', $paymentVoucher->narration ?? '') }}</textarea>

</div>

<div class="mt-4">

    <button class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save Voucher
    </button>

    <a href="{{ route('payment-vouchers.index') }}"
        class="btn btn-secondary">
        Cancel
    </a>

</div>