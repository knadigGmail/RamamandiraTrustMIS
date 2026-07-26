@extends('layouts.app')

@section('title', 'Financial Account Details')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3>Financial Account Details</h3>

            <small class="text-muted">

                View Financial Account Information

            </small>

        </div>

        <div>

            <a href="{{ route('financial-accounts.edit', $financialAccount) }}"
               class="btn btn-warning">

                <i class="fas fa-edit"></i>

                Edit

            </a>

            <a href="{{ route('financial-accounts.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Back

            </a>

        </div>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">Account Code</th>
                    <td>{{ $financialAccount->account_code }}</td>
                </tr>

                <tr>
                    <th>Account Name</th>
                    <td>{{ $financialAccount->account_name }}</td>
                </tr>

                <tr>
                    <th>Account Type</th>
                    <td>{{ $financialAccount->account_type }}</td>
                </tr>

                <tr>
                    <th>Bank Name</th>
                    <td>{{ $financialAccount->bank_name }}</td>
                </tr>

                <tr>
                    <th>Branch</th>
                    <td>{{ $financialAccount->branch }}</td>
                </tr>

                <tr>
                    <th>Account Holder</th>
                    <td>{{ $financialAccount->account_holder }}</td>
                </tr>

                <tr>
                    <th>Account Number</th>
                    <td>{{ $financialAccount->account_number }}</td>
                </tr>

                <tr>
                    <th>IFSC</th>
                    <td>{{ $financialAccount->ifsc }}</td>
                </tr>

                <tr>
                    <th>UPI ID</th>
                    <td>{{ $financialAccount->upi_id }}</td>
                </tr>

                <tr>
                    <th>Opening Balance</th>
                    <td>₹ {{ number_format($financialAccount->opening_balance, 2) }}</td>
                </tr>

                <tr>
                    <th>Default Account</th>
                    <td>{{ $financialAccount->is_default ? 'Yes' : 'No' }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>{{ $financialAccount->is_active ? 'Active' : 'Inactive' }}</td>
                </tr>

                <tr>
                    <th>Remarks</th>
                    <td>{{ $financialAccount->remarks }}</td>
                </tr>

                <tr>
                    <th>QR Code</th>
                    <td>

                        @if($financialAccount->qr_code)

                            <img src="{{ asset('storage/'.$financialAccount->qr_code) }}"
                                 style="max-height:200px"
                                 class="img-thumbnail">

                        @else

                            <span class="text-muted">No QR Code Uploaded</span>

                        @endif

                    </td>
                </tr>

            </table>

        </div>

    </div>

</div>

@endsection