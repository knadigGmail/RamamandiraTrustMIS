@extends('layouts.app')

@section('title','Donation Register')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3>Donation Register</h3>
            <small class="text-muted">
                All Donations
            </small>
        </div>

        <a href="{{ route('donations.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            New Donation
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="table-responsive">

            <table class="table table-bordered table-hover mb-0">

                <thead class="table-dark">

                <tr>

                    <th>Receipt No</th>
                    <th>Date</th>
                    <th>Donor</th>
                    <th>Seva</th>
                    <th>Amount</th>
                    <th>Payment</th>
                    <th width="170">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($donations as $donation)

                    <tr>

                        <td>{{ $donation->receipt_no }}</td>

                        <td>{{ $donation->receipt_date->format('d-m-Y') }}</td>

                        <td>{{ $donation->donor->name }}</td>

                        <td>{{ $donation->seva->seva_name }}</td>

                        <td class="text-end">
                            ₹ {{ number_format($donation->amount,2) }}
                        </td>

                        <td>{{ $donation->payment_mode }}</td>

                        <td>

                            <a href="{{ route('donations.show',$donation) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{ route('donations.edit',$donation) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>
<a href="{{ route('donations.receipt',$donation) }}"
   class="btn btn-success btn-sm"
   target="_blank">

    <i class="fas fa-print"></i>

</a>
                            <form action="{{ route('donations.destroy',$donation) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this donation?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            No Donations Found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3">

        {{ $donations->links() }}

    </div>

</div>

@endsection