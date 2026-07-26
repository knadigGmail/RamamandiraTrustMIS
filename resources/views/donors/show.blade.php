@extends('adminlte::page')

@section('title','Donor Details')

@section('content_header')
<h1>Donor Details</h1>
@stop

@section('content')

<div class="card">

<div class="card-header">

<a href="{{ route('donors.index') }}"
class="btn btn-secondary">

<i class="fas fa-arrow-left"></i>

Back

</a>

</div>

<div class="card-body">

<div class="row">

<div class="col-md-3 text-center">

@if($donor->photo)

<img src="{{ asset('storage/'.$donor->photo) }}"
class="img-thumbnail"
width="220">

@else

<img src="{{ asset('images/avatar.png') }}"
class="img-thumbnail"
width="220">

@endif

</div>

<div class="col-md-9">

<table class="table table-bordered">

<tr>
<th width="220">Donor Code</th>
<td>{{ $donor->donor_code }}</td>
</tr>

<tr>
<th>Name</th>
<td>{{ $donor->name }}</td>
</tr>

<tr>
<th>Father / Spouse</th>
<td>{{ $donor->father_spouse_name }}</td>
</tr>

<tr>
<th>Mobile</th>
<td>{{ $donor->mobile }}</td>
</tr>

<tr>
<th>Alternate Mobile</th>
<td>{{ $donor->alternate_mobile }}</td>
</tr>

<tr>
<th>Email</th>
<td>{{ $donor->email }}</td>
</tr>

<tr>
<th>Address</th>
<td>{{ $donor->address }}</td>
</tr>

<tr>
<th>City</th>
<td>{{ $donor->city }}</td>
</tr>

<tr>
<th>State</th>
<td>{{ $donor->state }}</td>
</tr>

<tr>
<th>PIN Code</th>
<td>{{ $donor->pincode }}</td>
</tr>

<tr>
<th>PAN</th>
<td>{{ $donor->pan_no }}</td>
</tr>

<tr>
<th>Aadhaar</th>
<td>{{ $donor->aadhaar_no }}</td>
</tr>

<tr>
<th>Occupation</th>
<td>{{ $donor->occupation }}</td>
</tr>

<tr>
<th>Gotra</th>
<td>{{ $donor->gotra }}</td>
</tr>

<tr>
<th>Family Name</th>
<td>{{ $donor->family_name }}</td>
</tr>

<tr>
<th>Membership No</th>
<td>{{ $donor->membership_no }}</td>
</tr>

<tr>
<th>Life Member</th>
<td>
@if($donor->is_life_member)
<span class="badge bg-success">Yes</span>
@else
<span class="badge bg-secondary">No</span>
@endif
</td>
</tr>

<tr>
<th>Status</th>
<td>
@if($donor->status)
<span class="badge bg-success">Active</span>
@else
<span class="badge bg-danger">Inactive</span>
@endif
</td>
</tr>

<tr>
<th>Remarks</th>
<td>{{ $donor->remarks }}</td>
</tr>

</table>

</div>

</div>

</div>

</div>

@stop