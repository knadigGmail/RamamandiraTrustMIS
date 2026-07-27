<div class="row">

    <div class="col-md-6">

        <div class="form-group">
            <label>Trust Name (English)</label>

            <input
                type="text"
                name="trust_name"
                class="form-control"
                value="{{ old('trust_name', $setting->trust_name) }}">
        </div>

        <div class="form-group">
            <label>Trust Name (Kannada)</label>

            <input
                type="text"
                name="trust_name_kn"
                class="form-control"
                value="{{ old('trust_name_kn', $setting->trust_name_kn) }}">
        </div>

        <div class="form-group">
            <label>Registration No</label>

            <input
                type="text"
                name="registration_no"
                class="form-control"
                value="{{ old('registration_no', $setting->registration_no) }}">
        </div>

        <div class="form-group">
            <label>PAN Number</label>

            <input
                type="text"
                name="pan_no"
                class="form-control"
                value="{{ old('pan_no', $setting->pan_no) }}">
        </div>

        <div class="form-group">
            <label>GST Number</label>

            <input
                type="text"
                name="gst_no"
                class="form-control"
                value="{{ old('gst_no', $setting->gst_no) }}">
        </div>

    </div>

    <div class="col-md-6">

        <div class="form-group">
            <label>Address</label>

            <textarea
                name="address"
                class="form-control"
                rows="3">{{ old('address', $setting->address) }}</textarea>

        </div>

        <div class="form-group">
            <label>Village</label>

            <input
                type="text"
                name="village"
                class="form-control"
                value="{{ old('village', $setting->village) }}">
        </div>

        <div class="form-group">
            <label>Taluk</label>

            <input
                type="text"
                name="taluk"
                class="form-control"
                value="{{ old('taluk', $setting->taluk) }}">
        </div>

        <div class="form-group">
            <label>District</label>

            <input
                type="text"
                name="district"
                class="form-control"
                value="{{ old('district', $setting->district) }}">
        </div>

        <div class="form-group">
            <label>State</label>

            <input
                type="text"
                name="state"
                class="form-control"
                value="{{ old('state', $setting->state) }}">
        </div>

        <div class="form-group">
            <label>Pincode</label>

            <input
                type="text"
                name="pincode"
                class="form-control"
                value="{{ old('pincode', $setting->pincode) }}">
        </div>

    </div>

</div>

<hr>

<div class="row">

    <div class="col-md-4">

        <div class="form-group">

            <label>Phone</label>

            <input
                type="text"
                name="phone"
                class="form-control"
                value="{{ old('phone', $setting->phone) }}">

        </div>

    </div>

    <div class="col-md-4">

        <div class="form-group">

            <label>Mobile</label>

            <input
                type="text"
                name="mobile"
                class="form-control"
                value="{{ old('mobile', $setting->mobile) }}">

        </div>

    </div>

    <div class="col-md-4">

        <div class="form-group">

            <label>Email</label>

            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email', $setting->email) }}">

        </div>

    </div>

</div>

<div class="form-group">

    <label>Website</label>

    <input
        type="text"
        name="website"
        class="form-control"
        value="{{ old('website', $setting->website) }}">

</div>