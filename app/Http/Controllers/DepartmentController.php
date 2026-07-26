<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use App\Services\DepartmentService;

class DepartmentController extends Controller
{
    protected DepartmentService $service;

    public function __construct(DepartmentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $search = request('search');

        $query = Department::query();

        if ($search) {

            $query->where('department_code','like',"%{$search}%")
                  ->orWhere('name','like',"%{$search}%");
        }

        $departments = $query
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        $totalDepartments = Department::count();

        $activeDepartments = Department::where('status',1)->count();

        $inactiveDepartments = Department::where('status',0)->count();

        return view('departments.index',compact(

            'departments',

            'search',

            'totalDepartments',

            'activeDepartments',

            'inactiveDepartments'

        ));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()

            ->route('departments.index')

            ->with('success','Department created successfully.');
    }

    public function show(Department $department)
    {
        return view('departments.show',compact('department'));
    }

    public function edit(Department $department)
    {
        return view('departments.edit',compact('department'));
    }

    public function update(
        UpdateDepartmentRequest $request,
        Department $department
    ) {

        $this->service->update(
            $department,
            $request->validated()
        );

        return redirect()

            ->route('departments.index')

            ->with('success','Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $this->service->delete($department);

        return redirect()

            ->route('departments.index')

            ->with('success','Department deleted successfully.');
    }
}