@extends('layouts.app')

@section('title', 'Donation Details')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3>Donation Details</h3>
            <small class="text-muted">View Donation Information</small>
        </div>

        <div>

            <a href="{{ route('donations.edit', $donation) }}"
               class="btn btn-warning">
                <i class="fas fa-edit"></i>
                Edit
            </a>

            <a href="{{ route('donations.index') }}"
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
                    <th width="250">Receipt No</th>
                    <td>{{ $donation->receipt_no }}</td>
                </tr>

                <tr>
                    <th>Receipt Date</th>
                    <td>{{ $donation->receipt_date->format('d-m-Y') }}</td>
                </tr>

                <tr>
                    <th>Donor</th>
                    <td>{{ $donation->donor->name }}</td>
                </tr>

                <tr>
                    <th>Seva</th>
                    <td>{{ $donation->seva->seva_name }}</td>
                </tr>

                <tr>
                    <th>Financial Account</th>
                    <td>{{ $donation->financialAccount->account_name }}</td>
                </tr>

                <tr>
                    <th>Payment Mode</th>
                    <td>{{ $donation->payment_mode }}</td>
                </tr>

                <tr>
                    <th>Amount</th>
                    <td>₹ {{ number_format($donation->amount,2) }}</td>
                </tr>

                <tr>
                    <th>Transaction Reference</th>
                    <td>{{ $donation->transaction_reference }}</td>
                </tr>

                <tr>
                    <th>Remarks</th>
                    <td>{{ $donation->remarks }}</td>
                </tr>

                <tr>
                    <th>Receipt Printed</th>
                    <td>{{ $donation->receipt_printed ? 'Yes' : 'No' }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        {{ $donation->is_cancelled ? 'Cancelled' : 'Active' }}
                    </td>
                </tr>

            </table>

        </div>

    </div>

</div>

@endsection