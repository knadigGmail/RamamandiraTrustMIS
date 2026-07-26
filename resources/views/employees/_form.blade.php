<div class="row">

    {{-- Photo --}}
    <div class="col-md-3 text-center mb-3">

        @if(isset($employee) && $employee->photo)
            <img src="{{ asset('storage/'.$employee->photo) }}"
                 class="img-thumbnail mb-3"
                 width="180">
        @else
            <img src="{{ asset('images/no-image.png') }}"
                 class="img-thumbnail mb-3"
                 width="180">
        @endif

        <input type="file"
               name="photo"
               class="form-control">

        @error('photo')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="col-md-9">

        <div class="row">

            <div class="col-md-4 mb-3">
                <label>Employee Code</label>
                <input type="text"
                       class="form-control"
                       value="{{ $employee->employee_code ?? 'Auto Generated' }}"
                       readonly>
            </div>

            <div class="col-md-8 mb-3">
                <label>Employee Name <span class="text-danger">*</span></label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name', $employee->name ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>Father / Spouse Name</label>
                <input type="text"
                       name="father_spouse_name"
                       class="form-control"
                       value="{{ old('father_spouse_name', $employee->father_spouse_name ?? '') }}">
            </div>

            <div class="col-md-3 mb-3">
                <label>Gender</label>

                <select name="gender" class="form-control">
                    <option value="">Select</option>

                    <option value="Male"
                        {{ old('gender', $employee->gender ?? '') == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ old('gender', $employee->gender ?? '') == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                    <option value="Other"
                        {{ old('gender', $employee->gender ?? '') == 'Other' ? 'selected' : '' }}>
                        Other
                    </option>

                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label>Date of Birth</label>

                <input type="date"
                       name="date_of_birth"
                       class="form-control"
                       value="{{ old('date_of_birth', isset($employee->date_of_birth) ? $employee->date_of_birth->format('Y-m-d') : '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>Department</label>

                <select name="department_id" class="form-control">

                    <option value="">Select Department</option>

                    @foreach($departments as $department)

                        <option value="{{ $department->id }}"
                            {{ old('department_id', $employee->department_id ?? '') == $department->id ? 'selected' : '' }}>

                            {{ $department->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-6 mb-3">
                <label>Designation</label>

                <input type="text"
                       name="designation"
                       class="form-control"
                       value="{{ old('designation', $employee->designation ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Mobile</label>

                <input type="text"
                       name="mobile"
                       class="form-control"
                       value="{{ old('mobile', $employee->mobile ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Alternate Mobile</label>

                <input type="text"
                       name="alternate_mobile"
                       class="form-control"
                       value="{{ old('alternate_mobile', $employee->alternate_mobile ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Email</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email', $employee->email ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Aadhaar No</label>

                <input type="text"
                       name="aadhaar_no"
                       class="form-control"
                       value="{{ old('aadhaar_no', $employee->aadhaar_no ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>PAN No</label>

                <input type="text"
                       name="pan_no"
                       class="form-control"
                       value="{{ old('pan_no', $employee->pan_no ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Emergency Contact</label>

                <input type="text"
                       name="emergency_contact"
                       class="form-control"
                       value="{{ old('emergency_contact', $employee->emergency_contact ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Salary</label>

                <input type="number"
                       step="0.01"
                       name="salary"
                       class="form-control"
                       value="{{ old('salary', $employee->salary ?? '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Joining Date</label>

                <input type="date"
                       name="joining_date"
                       class="form-control"
                       value="{{ old('joining_date', isset($employee->joining_date) ? $employee->joining_date->format('Y-m-d') : '') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="1"
                        {{ old('status', $employee->status ?? 1) == 1 ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ old('status', $employee->status ?? 1) == 0 ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

            </div>

            <div class="col-md-12 mb-3">
                <label>Address</label>

                <textarea name="address"
                          class="form-control"
                          rows="3">{{ old('address', $employee->address ?? '') }}</textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label>Remarks</label>

                <textarea name="remarks"
                          class="form-control"
                          rows="3">{{ old('remarks', $employee->remarks ?? '') }}</textarea>
            </div>

        </div>

    </div>

</div>

<div class="card-footer">

    <button type="submit" class="btn btn-success">
        {{ $buttonText }}
    </button>

    <a href="{{ route('employees.index') }}"
       class="btn btn-secondary">
        Cancel
    </a>

</div>