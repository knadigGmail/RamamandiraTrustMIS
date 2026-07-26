<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trustee extends Model
{
    protected $fillable = [

        'trustee_code',

        'name',

        'father_spouse_name',

        'mobile',

        'email',

        'address',

        'designation',

        'joining_date',

        'end_date',

        'photo',

        'status',

        'remarks',

        'created_by',

        'updated_by'

    ];

    protected $casts = [
    'joining_date' => 'date',
    'end_date' => 'date',
];

public const STATUS_ACTIVE = 'Active';
public const STATUS_INACTIVE = 'Inactive';

public function isActive(): bool
{
    return $this->status === self::STATUS_ACTIVE;
}
}