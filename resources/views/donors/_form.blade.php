<div class="row">

    <div class="col-md-6 mb-3">
        <label>Donor Name <span class="text-danger">*</span></label>
        <input type="text"
               name="name"
               class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $donor->name ?? '') }}"
               required>

        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label>Father / Spouse Name</label>
        <input type="text"
               name="father_spouse_name"
               class="form-control"
               value="{{ old('father_spouse_name', $donor->father_spouse_name ?? '') }}">
    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-3">
        <label class="form-label">
    Mobile <span class="text-danger">*</span>
</label>
        <input type="text"
               name="mobile"
               class="form-control"
               value="{{ old('mobile', $donor->mobile ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Alternate Mobile</label>
        <input type="text"
               name="alternate_mobile"
               class="form-control"
               value="{{ old('alternate_mobile', $donor->alternate_mobile ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Email</label>
        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email', $donor->email ?? '') }}">
    </div>

</div>

<div class="mb-3">
    <label class="form-label">
    Address <span class="text-danger">*</span>
</label>
    <textarea name="address"
              class="form-control"
              rows="3">{{ old('address', $donor->address ?? '') }}</textarea>
</div>

<div class="row">

    <div class="col-md-4 mb-3">
        <label>City</label>
        <input type="text"
               name="city"
               class="form-control"
               value="{{ old('city', $donor->city ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>State</label>
        <input type="text"
               name="state"
               class="form-control"
               value="{{ old('state', $donor->state ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>PIN Code</label>
        <input type="text"
               name="pincode"
               class="form-control"
               value="{{ old('pincode', $donor->pincode ?? '') }}">
    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-3">
        <label>PAN No</label>
        <input type="text"
               name="pan_no"
               class="form-control"
               value="{{ old('pan_no', $donor->pan_no ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Aadhaar No</label>
        <input type="text"
               name="aadhaar_no"
               class="form-control"
               value="{{ old('aadhaar_no', $donor->aadhaar_no ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Occupation</label>
        <input type="text"
               name="occupation"
               class="form-control"
               value="{{ old('occupation', $donor->occupation ?? '') }}">
    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-3">
        <label>Date of Birth</label>
        <input type="date"
               name="dob"
               class="form-control"
               value="{{ old('dob', optional($donor->dob ?? null)->format('Y-m-d')) }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Anniversary</label>
        <input type="date"
               name="anniversary"
               class="form-control"
               value="{{ old('anniversary', optional($donor->anniversary ?? null)->format('Y-m-d')) }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Gotra</label>
        <input type="text"
               name="gotra"
               class="form-control"
               value="{{ old('gotra', $donor->gotra ?? '') }}">
    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-3">
        <label>Family Name</label>
        <input type="text"
               name="family_name"
               class="form-control"
               value="{{ old('family_name', $donor->family_name ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label>Membership No</label>
        <input type="text"
               name="membership_no"
               class="form-control"
               value="{{ old('membership_no', $donor->membership_no ?? '') }}">
    </div>

    <div class="col-md-4 mb-3 d-flex align-items-end">
        <div class="form-check">
            <input type="checkbox"
                   class="form-check-input"
                   name="is_life_member"
                   value="1"
                   {{ old('is_life_member', $donor->is_life_member ?? false) ? 'checked' : '' }}>

            <label class="form-check-label">
                Life Member
            </label>
        </div>
    </div>

</div>

<div class="mb-3">

    <label>Photo</label>

    <input type="file"
           name="photo"
           class="form-control">

    @if(isset($donor) && $donor->photo)

        <div class="mt-3">
            <img src="{{ asset('storage/'.$donor->photo) }}"
                 width="120"
                 class="img-thumbnail">
        </div>

    @endif

</div>

<div class="mb-3">

    <label>Remarks</label>

    <textarea name="remarks"
              rows="3"
              class="form-control">{{ old('remarks', $donor->remarks ?? '') }}</textarea>

</div>

<div class="form-check mb-4">

    <input class="form-check-input"
           type="checkbox"
           name="status"
           value="1"
           {{ old('status', $donor->status ?? true) ? 'checked' : '' }}>

    <label class="form-check-label">
        Active
    </label>

</div>

<button class="btn btn-primary">
    {{ $buttonText }}
</button>

<a href="{{ route('donors.index') }}" class="btn btn-secondary">
    Cancel
</a>