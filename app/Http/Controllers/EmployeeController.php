<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    protected EmployeeService $service;

    public function __construct(EmployeeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $search = request('search');

        $query = Employee::with('department');

        if ($search) {
            $query->where('employee_code', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('mobile', 'like', "%{$search}%")
                  ->orWhere('designation', 'like', "%{$search}%");
        }

        $employees = $query
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        $totalEmployees = Employee::count();
        $activeEmployees = Employee::where('status', 1)->count();
        $inactiveEmployees = Employee::where('status', 0)->count();
$newEmployees = Employee::whereMonth('joining_date', now()->month)
    ->whereYear('joining_date', now()->year)
    ->count();
        return view('employees.index', compact(
            'employees',
            'search',
            'totalEmployees',
            'activeEmployees',
            'inactiveEmployees',
            'newEmployees'
        ));
    }

    public function create()
    {
        $departments = Department::orderBy('name')->get();

        return view('employees.create', compact('departments'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        $employee->load('department');

        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::orderBy('name')->get();

        return view('employees.edit', compact('employee', 'departments'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $this->service->update(
            $employee,
            $request->validated()
        );

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $this->service->delete($employee);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}