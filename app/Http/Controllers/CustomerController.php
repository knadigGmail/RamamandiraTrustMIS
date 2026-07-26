<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected CustomerService $service;

    public function __construct(CustomerService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $search = $request->search;

        $customers = Customer::query()

            ->when($search, function ($query) use ($search) {

                $query->where('customer_code', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");

            })

            ->latest()

            ->paginate(10);

        return view('customers.index', [

            'customers' => $customers,

            'totalCustomers' => Customer::count(),

            'activeCustomers' => Customer::where('status', true)->count(),

            'inactiveCustomers' => Customer::where('status', false)->count(),

            'newCustomers' => Customer::whereMonth('created_at', now()->month)
                                      ->whereYear('created_at', now()->year)
                                      ->count(),

        ]);
    }

    public function create()
    {
        return view('customers.create');
    }

  public function store(StoreCustomerRequest $request)
{

    $this->service->create($request->validated());

    return redirect()
        ->route('customers.index')
        ->with('success', 'Customer created successfully.');
}

    public function show(Customer $customer)
{
    $customer->load([
        'bookings.hall',
    ]);

    return view('customers.show', compact('customer'));
}
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $this->service->update($customer, $request->validated());

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $this->service->delete($customer);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }
}