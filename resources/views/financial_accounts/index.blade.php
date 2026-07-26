@extends('layouts.app')

@section('title','Financial Accounts')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3>Financial Accounts</h3>
            <small class="text-muted">
                Manage Bank, Cash and UPI Accounts
            </small>
        </div>

        <a href="{{ route('financial-accounts.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Add Financial Account

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <form method="GET"
          action="{{ route('financial-accounts.index') }}"
          class="row mb-3">

        <div class="col-md-4">

            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search..."
                   value="{{ request('search') }}">

        </div>

        <div class="col-md-2">

            <button class="btn btn-primary">

                <i class="fas fa-search"></i>

                Search

            </button>

        </div>

    </form>

    <div class="card shadow-sm">

        <div class="table-responsive">

            <table class="table table-bordered table-hover mb-0">

                <thead class="table-dark">

                <tr>

                    <th>Code</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Bank</th>
                    <th>Opening Balance</th>
                    <th>Default</th>
                    <th>Status</th>
                    <th width="170">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($accounts as $account)

                    <tr>

                        <td>{{ $account->account_code }}</td>

                        <td>{{ $account->account_name }}</td>

                        <td>{{ $account->account_type }}</td>

                        <td>{{ $account->bank_name }}</td>

                        <td class="text-end">

                            ₹ {{ number_format($account->opening_balance,2) }}

                        </td>

                        <td>

                            @if($account->is_default)

                                <span class="badge bg-success">

                                    Yes

                                </span>

                            @endif

                        </td>

                        <td>

                            @if($account->is_active)

                                <span class="badge bg-primary">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Inactive

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('financial-accounts.show',$account) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{ route('financial-accounts.edit',$account) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('financial-accounts.destroy',$account) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this account?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center">

                            No Financial Accounts Found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3">

        {{ $accounts->links() }}

    </div>

</div>

@endsection