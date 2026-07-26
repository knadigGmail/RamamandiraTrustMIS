<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [

        'department_code',

        'name',

        'description',

        'status',

        'remarks',

        'created_by',

        'updated_by'

    ];
}