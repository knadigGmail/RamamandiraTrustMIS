<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $fillable = [

        'donor_code',

        'name',

        'father_spouse_name',

        'mobile',

        'alternate_mobile',

        'email',

        'address',

        'city',

        'state',

        'pincode',

        'pan_no',

        'aadhaar_no',

        'dob',

        'anniversary',

        'occupation',

        'gotra',

        'family_name',

        'is_life_member',

        'membership_no',

        'photo',

        'status',

        'remarks',

        'created_by',

        'updated_by',
    ];

    protected $casts = [

        'dob' => 'date',

        'anniversary' => 'date',

        'status' => 'boolean',

        'is_life_member' => 'boolean',
    ];
}