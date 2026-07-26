<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Http\UploadedFile;

class EmployeeService
{
    public function getAll()
    {
        return Employee::with('department')
            ->orderBy('name')
            ->paginate(10);
    }

    public function create(array $data): Employee
    {
        // Generate Employee Code
        $data['employee_code'] = CodeGeneratorService::generate(
            'employees',
            'employee_code',
            'EMP'
        );

        // Upload Photo
        if (
            isset($data['photo']) &&
            $data['photo'] instanceof UploadedFile
        ) {
            $data['photo'] = PhotoUploadService::upload(
                $data['photo'],
                'employees'
            );
        }

        return Employee::create($data);
    }

    public function update(Employee $employee, array $data): Employee
    {
        // Replace Photo
        if (
            isset($data['photo']) &&
            $data['photo'] instanceof UploadedFile
        ) {
            $data['photo'] = PhotoUploadService::upload(
                $data['photo'],
                'employees',
                $employee->photo
            );
        }

        $employee->update($data);

        return $employee;
    }

    public function delete(Employee $employee): bool
    {
        if ($employee->photo) {
            PhotoUploadService::delete($employee->photo);
        }

        return $employee->delete();
    }
}