<div class="mb-3">
    <label class="form-label">Trustee Name <span class="text-danger">*</span></label>
    <input type="text"
           name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $trustee->name ?? '') }}"
           required>

    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Father / Spouse Name</label>
    <input type="text"
           name="father_spouse_name"
           class="form-control"
           value="{{ old('father_spouse_name', $trustee->father_spouse_name ?? '') }}">
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Mobile</label>
        <input type="text"
               name="mobile"
               class="form-control"
               value="{{ old('mobile', $trustee->mobile ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email', $trustee->email ?? '') }}">
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Designation</label>
   <select name="designation" class="form-control">

    <option value="">Select Designation</option>

    @foreach([
        'PRESIDENT',
        'VICE PRESIDENT',
        'MANAGING TRUSTEE',
        'SECRETARY',
        'TREASURER',
        'TRUSTEE'
    ] as $designation)

        <option value="{{ $designation }}"
            {{ old('designation', $trustee->designation ?? '') == $designation ? 'selected' : '' }}>
            {{ $designation }}
        </option>

    @endforeach

</select>
</div>

<div class="mb-3">
    <label class="form-label">Address</label>
    <textarea name="address"
              rows="3"
              class="form-control">{{ old('address', $trustee->address ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Joining Date</label>
        <input type="date"
               name="joining_date"
               class="form-control"
               value="{{ old('joining_date', $trustee->joining_date ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">End Date</label>
        <input type="date"
               name="end_date"
               class="form-control"
               value="{{ old('end_date', $trustee->end_date ?? '') }}">
    </div>
</div>
<div class="mb-3">

    <label class="form-label">
        Trustee Photo
    </label>
@if(isset($trustee) && $trustee->photo)
    <div class="mb-3">
        <label class="form-label">Current Photo</label><br>

        <img src="{{ asset('storage/'.$trustee->photo) }}"
             width="120"
             class="img-thumbnail">
    </div>
@endif
    <input type="file"
           name="photo"
           class="form-control">

           
    @if(isset($trustee) && $trustee->photo)

        <div class="mt-2">
            <img src="{{ asset('storage/'.$trustee->photo) }}"
                 width="120"
                 class="img-thumbnail rounded-circle">
        </div>

    @endif

</div>
<div class="mb-3">
    <label class="form-label">Remarks</label>
    <textarea name="remarks"
              rows="3"
              class="form-control">{{ old('remarks', $trustee->remarks ?? '') }}</textarea>
</div>

<div class="form-check mb-3">
    <input class="form-check-input"
           type="checkbox"
           name="status"
           value="1"
           {{ old('status', $trustee->status ?? true) ? 'checked' : '' }}>

    <label class="form-check-label">
        Active
    </label>
</div>

<hr>

<div class="d-flex justify-content-end">

    <a href="{{ route('trustees.index') }}"
       class="btn btn-secondary mr-2">
        Cancel
    </a>

    <button type="submit"
            class="btn btn-success">
        <i class="fas fa-save"></i>
        {{ $buttonText }}
    </button>

</div>