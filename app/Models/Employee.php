<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_code',
        'photo',
        'name',
        'father_spouse_name',
        'gender',
        'date_of_birth',
        'department_id',
        'designation',
        'mobile',
        'alternate_mobile',
        'email',
        'aadhaar_no',
        'pan_no',
        'address',
        'joining_date',
        'relieving_date',
        'salary',
        'bank_name',
        'account_number',
        'ifsc_code',
        'upi_id',
        'emergency_contact',
        'status',
        'remarks',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'joining_date' => 'date',
        'relieving_date' => 'date',
        'status' => 'boolean',
        'salary' => 'decimal:2',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}