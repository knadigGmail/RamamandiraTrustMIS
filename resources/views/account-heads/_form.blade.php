<div class="row">

<div class="col-md-4">

<label>Account Code</label>

<input
type="text"
name="account_code"
class="form-control"
value="{{ old('account_code',$accountHead->account_code ?? '') }}"
required>

</div>

<div class="col-md-8">

<label>Account Name</label>

<input
type="text"
name="account_name"
class="form-control"
value="{{ old('account_name',$accountHead->account_name ?? '') }}"
required>

</div>

</div>

<br>

<div class="row">

<div class="col-md-4">

<label>Account Type</label>

<select
name="account_type"
class="form-control">

@foreach(['Asset','Liability','Income','Expense','Capital'] as $type)

<option
value="{{ $type }}"
@selected(old('account_type',$accountHead->account_type ?? '')==$type)>

{{ $type }}

</option>

@endforeach

</select>

</div>

<div class="col-md-4">

<label>Parent Account</label>

<select
name="parent_id"
class="form-control">

<option value="">None</option>

@foreach($parents as $parent)

<option
value="{{ $parent->id }}"
@selected(old('parent_id',$accountHead->parent_id ?? '')==$parent->id)>

{{ $parent->account_name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-4">

<label>Status</label>

<select
name="is_active"
class="form-control">

<option value="1">Active</option>

<option value="0">Inactive</option>

</select>

</div>

</div>

<br>

<label>Description</label>

<textarea
name="description"
class="form-control"
rows="4">{{ old('description',$accountHead->description ?? '') }}</textarea>