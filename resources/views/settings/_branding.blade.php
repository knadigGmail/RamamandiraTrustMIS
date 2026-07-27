<div class="row">

    <div class="col-md-4">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h5 class="mb-0">Trust Logo</h5>
            </div>

            <div class="card-body text-center">

                @if($setting->logo)

                    <img
                        src="{{ asset('storage/'.$setting->logo) }}"
                        class="img-fluid mb-3"
                        style="max-height:150px">

                @endif

                <input
                    type="file"
                    name="logo"
                    class="form-control">

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card card-outline card-success">

            <div class="card-header">
                <h5 class="mb-0">Authorised Signature</h5>
            </div>

            <div class="card-body text-center">

                @if($setting->signature)

                    <img
                        src="{{ asset('storage/'.$setting->signature) }}"
                        class="img-fluid mb-3"
                        style="max-height:120px">

                @endif

                <input
                    type="file"
                    name="signature"
                    class="form-control">

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card card-outline card-warning">

            <div class="card-header">
                <h5 class="mb-0">UPI QR Code</h5>
            </div>

            <div class="card-body text-center">

                @if($setting->qr_code)

                    <img
                        src="{{ asset('storage/'.$setting->qr_code) }}"
                        class="img-fluid mb-3"
                        style="max-height:180px">

                @endif

                <input
                    type="file"
                    name="qr_code"
                    class="form-control">

            </div>

        </div>

    </div>

</div>