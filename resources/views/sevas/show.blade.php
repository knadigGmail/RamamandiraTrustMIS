@extends('layouts.app')

@section('title', 'Seva Details')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3>Seva Details</h3>

            <small class="text-muted">
                View Seva Information
            </small>

        </div>

        <div>

            <a href="{{ route('sevas.edit', $seva) }}"
               class="btn btn-warning">

                <i class="fas fa-edit"></i>
                Edit

            </a>

            <a href="{{ route('sevas.index') }}"
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
                    <th width="250">Seva Code</th>
                    <td>{{ $seva->seva_code }}</td>
                </tr>

                <tr>
                    <th>Seva Name</th>
                    <td>{{ $seva->seva_name }}</td>
                </tr>

                <tr>
                    <th>Category</th>
                    <td>{{ $seva->category }}</td>
                </tr>

                <tr>
                    <th>Suggested Amount</th>
                    <td>₹ {{ number_format($seva->suggested_amount,2) }}</td>
                </tr>

                <tr>
                    <th>Minimum Amount</th>
                    <td>₹ {{ number_format($seva->minimum_amount,2) }}</td>
                </tr>

                <tr>
                    <th>Receipt Required</th>
                    <td>{{ $seva->receipt_required ? 'Yes' : 'No' }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>{{ $seva->is_active ? 'Active' : 'Inactive' }}</td>
                </tr>

                <tr>
                    <th>Description</th>
                    <td>{{ $seva->description }}</td>
                </tr>

            </table>

        </div>

    </div>

</div>

@endsection