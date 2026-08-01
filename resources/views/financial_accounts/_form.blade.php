<div class="card shadow-sm">

    <div class="card-header bg-primary text-white">
        Financial Account Details
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-3 mb-3">
                <label class="form-label">Account Code</label>

                <input type="text"
                       name="account_code"
                       class="form-control"
                       value="{{ old('account_code', $financialAccount->account_code ?? $accountCode ?? '') }}"
                       readonly>

                @error('account_code')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-5 mb-3">
                <label class="form-label">Account Name <span class="text-danger">*</span></label>

                <input type="text"
                       name="account_name"
                       class="form-control"
                       value="{{ old('account_name', $financialAccount->account_name ?? '') }}"
                       required>

                @error('account_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Account Type <span class="text-danger">*</span></label>

                <select name="account_type"
                        class="form-select"
                        required>

                    <option value="">Select</option>

                    @foreach(['Bank','Cash','UPI'] as $type)

                        <option value="{{ $type }}"
                            {{ old('account_type', $financialAccount->account_type ?? '') == $type ? 'selected' : '' }}>

                            {{ $type }}

                        </option>

                    @endforeach

                </select>

                @error('account_type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
<div class="col-md-4 mb-3">

    <label class="form-label">
        Chart of Account
        <span class="text-danger">*</span>
    </label>

    <select name="account_head_id"
            class="form-select"
            required>

        <option value="">Select Account Head</option>

        @foreach($accountHeads as $head)

            <option value="{{ $head->id }}"
                {{ old('account_head_id', $financialAccount->account_head_id ?? '') == $head->id ? 'selected' : '' }}>

                {{ $head->account_code }} - {{ $head->account_name }}

            </option>

        @endforeach

    </select>

    @error('account_head_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>
        </div>

        <hr>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">Bank Name</label>

                <input type="text"
                       name="bank_name"
                       class="form-control"
                       value="{{ old('bank_name', $financialAccount->bank_name ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Branch</label>

                <input type="text"
                       name="branch"
                       class="form-control"
                       value="{{ old('branch', $financialAccount->branch ?? '') }}">
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">Account Holder</label>

                <input type="text"
                       name="account_holder"
                       class="form-control"
                       value="{{ old('account_holder', $financialAccount->account_holder ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Account Number</label>

                <input type="text"
                       name="account_number"
                       class="form-control"
                       value="{{ old('account_number', $financialAccount->account_number ?? '') }}">
            </div>

        </div>

        <div class="row">

            <div class="col-md-4 mb-3">
                <label class="form-label">IFSC</label>

                <input type="text"
                       name="ifsc"
                       class="form-control"
                       value="{{ old('ifsc', $financialAccount->ifsc ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">UPI ID</label>

                <input type="text"
                       name="upi_id"
                       class="form-control"
                       value="{{ old('upi_id', $financialAccount->upi_id ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Opening Balance</label>

                <input type="number"
                       step="0.01"
                       name="opening_balance"
                       class="form-control"
                       value="{{ old('opening_balance', $financialAccount->opening_balance ?? 0) }}">
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">QR Code</label>

                <input type="file"
                       name="qr_code"
                       class="form-control">

                @if(isset($financialAccount) && $financialAccount->qr_code)

                    <div class="mt-2">

                        <img src="{{ asset('storage/'.$financialAccount->qr_code) }}"
                             class="img-thumbnail"
                             style="max-height:150px;">

                    </div>

                @endif

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Remarks</label>

                <textarea name="remarks"
                          rows="6"
                          class="form-control">{{ old('remarks', $financialAccount->remarks ?? '') }}</textarea>

            </div>

        </div>

        <div class="row">

            <div class="col-md-3">

                <div class="form-check">

                    <input type="checkbox"
                           class="form-check-input"
                           name="is_default"
                           value="1"
                           {{ old('is_default', $financialAccount->is_default ?? false) ? 'checked' : '' }}>

                    <label class="form-check-label">

                        Default Account

                    </label>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-check">

                    <input type="checkbox"
                           class="form-check-input"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $financialAccount->is_active ?? true) ? 'checked' : '' }}>

                    <label class="form-check-label">

                        Active

                    </label>

                </div>

            </div>

        </div>

    </div>

    <div class="card-footer text-end">

        <a href="{{ route('financial-accounts.index') }}"
           class="btn btn-secondary">

            Cancel

        </a>

        <button type="submit"
                class="btn btn-success">

            Save Financial Account

        </button>

    </div>

</div>