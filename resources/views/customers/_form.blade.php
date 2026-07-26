@csrf

<div class="card">
    <div class="card-header bg-primary">
        <h3 class="card-title">
            <i class="fas fa-user"></i> Customer Information
        </h3>
    </div>

    <div class="card-body">

        <div class="row">

            {{-- Customer Code --}}
            <div class="col-md-3 mb-3">
                <label>Customer Code</label>
                <input type="text"
                       class="form-control"
                       value="{{ $customer->customer_code ?? 'Auto Generated' }}"
                       readonly>
            </div>

            {{-- Name --}}
            <div class="col-md-5 mb-3">
                <label>Customer Name <span class="text-danger">*</span></label>
                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $customer->name ?? '') }}"
                       required>

                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Mobile --}}
            <div class="col-md-4 mb-3">
                <label>Mobile <span class="text-danger">*</span></label>
                <input type="text"
                       name="mobile"
                       class="form-control"
                       value="{{ old('mobile', $customer->mobile ?? '') }}">
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Father / Spouse Name</label>
                <input type="text"
                       name="father_spouse_name"
                       class="form-control"
                       value="{{ old('father_spouse_name', $customer->father_spouse_name ?? '') }}">
            </div>

            <div class="col-md-3 mb-3">
                <label>Gender</label>

                <select name="gender" class="form-control">

                    <option value="">Select</option>

                    <option value="Male"
                        @selected(old('gender',$customer->gender ?? '')=='Male')>
                        Male
                    </option>

                    <option value="Female"
                        @selected(old('gender',$customer->gender ?? '')=='Female')>
                        Female
                    </option>

                    <option value="Other"
                        @selected(old('gender',$customer->gender ?? '')=='Other')>
                        Other
                    </option>

                </select>

            </div>

            <div class="col-md-3 mb-3">
                <label>Date of Birth</label>

                <input type="date"
                       name="date_of_birth"
                       class="form-control"
                       value="{{ old('date_of_birth', isset($customer) && $customer->date_of_birth ? $customer->date_of_birth->format('Y-m-d') : '') }}">
            </div>

        </div>

        <div class="row">

            <div class="col-md-4 mb-3">
                <label>Alternate Mobile</label>
                <input type="text"
                       name="alternate_mobile"
                       class="form-control"
                       value="{{ old('alternate_mobile',$customer->alternate_mobile ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Email</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email',$customer->email ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="1"
                        @selected(old('status',$customer->status ?? 1)==1)>
                        Active
                    </option>

                    <option value="0"
                        @selected(old('status',$customer->status ?? 1)==0)>
                        Inactive
                    </option>

                </select>

            </div>

        </div>

        <hr>

        <h5><i class="fas fa-id-card"></i> Identity Details</h5>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Aadhaar Number</label>
                <input type="text"
                       name="aadhaar_no"
                       class="form-control"
                       value="{{ old('aadhaar_no',$customer->aadhaar_no ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>PAN Number</label>
                <input type="text"
                       name="pan_no"
                       class="form-control"
                       value="{{ old('pan_no',$customer->pan_no ?? '') }}">
            </div>

        </div>

        <hr>

        <h5><i class="fas fa-home"></i> Address</h5>

        <div class="mb-3">

            <label>Address</label>

            <textarea name="address"
                      rows="3"
                      class="form-control">{{ old('address',$customer->address ?? '') }}</textarea>

        </div>

        <div class="row">

            <div class="col-md-4 mb-3">
                <label>City</label>
                <input type="text"
                       name="city"
                       class="form-control"
                       value="{{ old('city',$customer->city ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>State</label>
                <input type="text"
                       name="state"
                       class="form-control"
                       value="{{ old('state',$customer->state ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>PIN Code</label>
                <input type="text"
                       name="pincode"
                       class="form-control"
                       value="{{ old('pincode',$customer->pincode ?? '') }}">
            </div>

        </div>

        <hr>

        <h5><i class="fas fa-users"></i> Additional Details</h5>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Gotra</label>
                <input type="text"
                       name="gotra"
                       class="form-control"
                       value="{{ old('gotra',$customer->gotra ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>Family Name</label>
                <input type="text"
                       name="family_name"
                       class="form-control"
                       value="{{ old('family_name',$customer->family_name ?? '') }}">
            </div>

        </div>

        <div class="row">

            <div class="col-md-4 mb-3">

                <label>Photo</label>

                <input type="file"
                       name="photo"
                       class="form-control">

            </div>

            <div class="col-md-8">

                @isset($customer)

                    @if($customer->photo)

                        <img src="{{ asset('storage/'.$customer->photo) }}"
                             width="120"
                             class="img-thumbnail mt-4">

                    @endif

                @endisset

            </div>

        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="is_donor"
                           value="1"
                           @checked(old('is_donor',$customer->is_donor ?? false))>

                    <label class="form-check-label">
                        Donor
                    </label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="is_devotee"
                           value="1"
                           @checked(old('is_devotee',$customer->is_devotee ?? false))>

                    <label class="form-check-label">
                        Devotee
                    </label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="is_life_member"
                           value="1"
                           @checked(old('is_life_member',$customer->is_life_member ?? false))>

                    <label class="form-check-label">
                        Life Member
                    </label>
                </div>
            </div>

        </div>

        <div class="mt-4">

            <label>Remarks</label>

            <textarea name="remarks"
                      rows="3"
                      class="form-control">{{ old('remarks',$customer->remarks ?? '') }}</textarea>

        </div>

    </div>

    <div class="card-footer">

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Save Customer
        </button>

        <a href="{{ route('customers.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </div>

</div>