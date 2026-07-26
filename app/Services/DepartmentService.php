<?php

namespace App\Services;

use App\Models\Department;

class DepartmentService
{
    public function getAll()
    {
        return Department::orderBy('name')->paginate(10);
    }

    public function create(array $data): Department
    {
        $lastDepartment = Department::latest('id')->first();

        $nextNumber = 1;

        if ($lastDepartment &&
            preg_match('/DEP(\d+)/', $lastDepartment->department_code, $matches)) {

            $nextNumber = (int)$matches[1] + 1;
        }

        $data['department_code'] =
            'DEP'.str_pad($nextNumber,4,'0',STR_PAD_LEFT);

        return Department::create($data);
    }

    public function update(
        Department $department,
        array $data
    ): Department {

        $department->update($data);

        return $department;
    }

    public function delete(
        Department $department
    ): bool {

        return $department->delete();
    }
}