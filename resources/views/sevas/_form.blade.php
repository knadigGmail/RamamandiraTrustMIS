<div class="card shadow-sm">

    <div class="card-header bg-primary text-white">
        Seva Details
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-3 mb-3">
                <label class="form-label">Seva Code</label>

                <input type="text"
                       name="seva_code"
                       class="form-control"
                       value="{{ old('seva_code', $seva->seva_code ?? $sevaCode ?? '') }}"
                       readonly>

                @error('seva_code')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Seva Name <span class="text-danger">*</span>
                </label>

                <input type="text"
                       name="seva_name"
                       class="form-control"
                       value="{{ old('seva_name', $seva->seva_name ?? '') }}"
                       required>

                @error('seva_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Category</label>

                <select name="category"
                        class="form-select">

                    <option value="">Select</option>

                    @foreach([
                        'Daily Seva',
                        'Monthly Seva',
                        'Annual Seva',
                        'Festival',
                        'Donation',
                        'Special'
                    ] as $category)

                        <option value="{{ $category }}"
                            {{ old('category', $seva->category ?? '') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>

                    @endforeach

                </select>
            </div>

        </div>

        <div class="row">

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Suggested Amount
                </label>

                <input type="number"
                       step="0.01"
                       name="suggested_amount"
                       class="form-control"
                       value="{{ old('suggested_amount', $seva->suggested_amount ?? 0) }}">

            </div>

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Minimum Amount
                </label>

                <input type="number"
                       step="0.01"
                       name="minimum_amount"
                       class="form-control"
                       value="{{ old('minimum_amount', $seva->minimum_amount ?? 0) }}">

            </div>

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Description
                </label>

                <input type="text"
                       name="description"
                       class="form-control"
                       value="{{ old('description', $seva->description ?? '') }}">

            </div>

        </div>

        <div class="row">

            <div class="col-md-3">

                <div class="form-check">

                    <input type="checkbox"
                           class="form-check-input"
                           name="receipt_required"
                           value="1"
                           {{ old('receipt_required', $seva->receipt_required ?? true) ? 'checked' : '' }}>

                    <label class="form-check-label">
                        Receipt Required
                    </label>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-check">

                    <input type="checkbox"
                           class="form-check-input"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $seva->is_active ?? true) ? 'checked' : '' }}>

                    <label class="form-check-label">
                        Active
                    </label>

                </div>

            </div>

        </div>

    </div>

    <div class="card-footer text-end">

        <a href="{{ route('sevas.index') }}"
           class="btn btn-secondary">

            Cancel

        </a>

        <button type="submit"
                class="btn btn-success">

            Save Seva

        </button>

    </div>

</div>