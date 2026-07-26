@csrf

<div class="card">

    <div class="card-header bg-primary">
        <h3 class="card-title">
            <i class="fas fa-building"></i> Hall Information
        </h3>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-3 mb-3">
                <label>Hall Code</label>
                <input type="text"
                       class="form-control"
                       value="{{ $hall->hall_code ?? 'Auto Generated' }}"
                       readonly>
            </div>

            <div class="col-md-5 mb-3">
                <label>Hall Name <span class="text-danger">*</span></label>

                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $hall->name ?? '') }}"
                       required>

                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label>Capacity</label>

                <input type="number"
                       name="capacity"
                       class="form-control"
                       value="{{ old('capacity', $hall->capacity ?? 0) }}">
            </div>

        </div>

        <div class="row">

            <div class="col-md-3 mb-3">
                <label>Dining Capacity</label>

                <input type="number"
                       name="dining_capacity"
                       class="form-control"
                       value="{{ old('dining_capacity', $hall->dining_capacity ?? 0) }}">
            </div>

            <div class="col-md-3 mb-3">
                <label>Rooms</label>

                <input type="number"
                       name="rooms"
                       class="form-control"
                       value="{{ old('rooms', $hall->rooms ?? 0) }}">
            </div>

            <div class="col-md-3 mb-3">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="1"
                        @selected(old('status', $hall->status ?? 1)==1)>
                        Active
                    </option>

                    <option value="0"
                        @selected(old('status', $hall->status ?? 1)==0)>
                        Inactive
                    </option>

                </select>
            </div>

        </div>

        <hr>

        <h5><i class="fas fa-rupee-sign"></i> Charges</h5>

        <div class="row">

            <div class="col-md-3 mb-3">
                <label>Hall Rent</label>

                <input type="number"
                       step="0.01"
                       name="hall_rent"
                       class="form-control"
                       value="{{ old('hall_rent', $hall->hall_rent ?? 0) }}">
            </div>

            <div class="col-md-3 mb-3">
                <label>Electricity Charges</label>

                <input type="number"
                       step="0.01"
                       name="electricity_charges"
                       class="form-control"
                       value="{{ old('electricity_charges', $hall->electricity_charges ?? 0) }}">
            </div>

            <div class="col-md-3 mb-3">
                <label>Cleaning Charges</label>

                <input type="number"
                       step="0.01"
                       name="cleaning_charges"
                       class="form-control"
                       value="{{ old('cleaning_charges', $hall->cleaning_charges ?? 0) }}">
            </div>

            <div class="col-md-3 mb-3">
                <label>Security Deposit</label>

                <input type="number"
                       step="0.01"
                       name="security_deposit"
                       class="form-control"
                       value="{{ old('security_deposit', $hall->security_deposit ?? 0) }}">
            </div>

        </div>

        <hr>

        <div class="row">

            <div class="col-md-4">

                <label>Photo</label>

                <input type="file"
                       name="photo"
                       class="form-control">

            </div>

            <div class="col-md-8">

                @isset($hall)
                    @if($hall->photo)

                        <img src="{{ asset('storage/'.$hall->photo) }}"
                             width="150"
                             class="img-thumbnail">

                    @endif
                @endisset

            </div>

        </div>

        <div class="mt-4">

            <label>Remarks</label>

            <textarea name="remarks"
                      rows="4"
                      class="form-control">{{ old('remarks', $hall->remarks ?? '') }}</textarea>

        </div>

    </div>

    <div class="card-footer">

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Save Hall
        </button>

        <a href="{{ route('halls.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </div>

</div>