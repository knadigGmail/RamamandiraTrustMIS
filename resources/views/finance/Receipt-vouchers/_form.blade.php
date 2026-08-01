@csrf

<div class="row">

    <div class="col-md-4 mb-3">

        <label class="form-label">Voucher No</label>

        <input type="text"
               class="form-control"
               value="{{ $voucherNo ?? $receiptVoucher->voucher_no }}"
               readonly>

    </div>

    <div class="col-md-4 mb-3">

        <label class="form-label">Voucher Date <span class="text-danger">*</span></label>

        <input type="date"
               name="voucher_date"
               class="form-control"
               value="{{ old('voucher_date', isset($receiptVoucher) ? $receiptVoucher->voucher_date?->format('Y-m-d') : now()->format('Y-m-d')) }}">

        @error('voucher_date')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="col-md-4 mb-3">

        <label class="form-label">Receipt Mode <span class="text-danger">*</span></label>

        <select name="receipt_mode" class="form-control">

            @foreach(['Cash','Cheque','NEFT','RTGS','UPI'] as $mode)

                <option value="{{ $mode }}"
                    @selected(old('receipt_mode', $receiptVoucher->receipt_mode ?? '') == $mode)>

                    {{ $mode }}

                </option>

            @endforeach

        </select>

        @error('receipt_mode')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">Received From <span class="text-danger">*</span></label>

        <input type="text"
               name="received_from"
               class="form-control"
               value="{{ old('received_from', $receiptVoucher->received_from ?? '') }}">

        @error('received_from')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">Income Account <span class="text-danger">*</span></label>

        <select name="account_head_id" class="form-control">

            <option value="">-- Select Income Account --</option>

            @foreach($accountHeads as $head)

                <option value="{{ $head->id }}"
                    @selected(old('account_head_id', $receiptVoucher->account_head_id ?? '') == $head->id)>

                    {{ $head->account_code }} - {{ $head->account_name }}

                </option>

            @endforeach

        </select>

        @error('account_head_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">Cash / Bank Account <span class="text-danger">*</span></label>

        <select name="financial_account_id"
                class="form-control">

            <option value="">-- Select Financial Account --</option>

            @foreach($financialAccounts as $account)

                <option value="{{ $account->id }}"
                    @selected(old('financial_account_id', $receiptVoucher->financial_account_id ?? '') == $account->id)>

                    {{ $account->account_name }}

                </option>

            @endforeach

        </select>

        @error('financial_account_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="col-md-3 mb-3">

        <label class="form-label">Amount <span class="text-danger">*</span></label>

        <input type="number"
               step="0.01"
               name="amount"
               class="form-control"
               value="{{ old('amount', $receiptVoucher->amount ?? '') }}">

        @error('amount')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="col-md-3 mb-3">

        <label class="form-label">Reference No</label>

        <input type="text"
               name="reference_no"
               class="form-control"
               value="{{ old('reference_no', $receiptVoucher->reference_no ?? '') }}">

    </div>

</div>

<div class="mb-3">

    <label class="form-label">Narration</label>

    <textarea name="narration"
              rows="4"
              class="form-control">{{ old('narration', $receiptVoucher->narration ?? '') }}</textarea>

</div>

<div class="mb-4">

    <label class="form-label">Attachment</label>

    <input type="file"
           name="attachment"
           class="form-control">

    @if(isset($receiptVoucher) && $receiptVoucher->attachment)

        <div class="mt-2">

            <a href="{{ asset('storage/'.$receiptVoucher->attachment) }}"
               target="_blank"
               class="btn btn-sm btn-outline-primary">

                <i class="fas fa-paperclip"></i>

                View Current Attachment

            </a>

        </div>

    @endif

</div>

<div class="text-end">

    <a href="{{ route('receipt-vouchers.index') }}"
       class="btn btn-secondary">

        Cancel

    </a>

    <button class="btn btn-success">

        <i class="fas fa-save"></i>

        Save Receipt Voucher

    </button>

</div>