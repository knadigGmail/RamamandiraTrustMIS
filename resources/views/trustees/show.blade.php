@extends('adminlte::page')

@section('title', 'Trustee Details')

@section('content_header')
    <h1>Trustee Details</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">{{ $trustee->name }}</h3>

        <a href="{{ route('trustees.index') }}"
           class="btn btn-secondary btn-sm">
            Back
        </a>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-3 text-center">

                @if($trustee->photo)
                    <img src="{{ asset('storage/'.$trustee->photo) }}"
                         class="img-thumbnail"
                         style="width:180px;height:180px;object-fit:cover;">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($trustee->name) }}&size=180"
                         class="img-thumbnail">
                @endif

            </div>

            <div class="col-md-9">

                <table class="table table-bordered">

                    <tr>
                        <th width="220">Trustee Code</th>
                        <td>{{ $trustee->trustee_code }}</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>{{ $trustee->name }}</td>
                    </tr>

                    <tr>
                        <th>Father / Spouse</th>
                        <td>{{ $trustee->father_spouse_name }}</td>
                    </tr>

                    <tr>
                        <th>Mobile</th>
                        <td>{{ $trustee->mobile }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $trustee->email }}</td>
                    </tr>

                    <tr>
                        <th>Designation</th>
                        <td>{{ $trustee->designation }}</td>
                    </tr>

                    <tr>
                        <th>Joining Date</th>
                        <td>{{ $trustee->joining_date }}</td>
                    </tr>

                    <tr>
                        <th>End Date</th>
                        <td>{{ $trustee->end_date }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if($trustee->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td>{{ $trustee->address }}</td>
                    </tr>

                    <tr>
                        <th>Remarks</th>
                        <td>{{ $trustee->remarks }}</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

@stop