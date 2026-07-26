<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $fillable = [

        'hall_code',

        'name',

        'capacity',

        'dining_capacity',

        'hall_rent',

        'electricity_charges',

        'cleaning_charges',

        'security_deposit',

        'photo',

        'status',

        'remarks',

    ];

    protected $casts = [

        'status' => 'boolean',

        'hall_rent' => 'decimal:2',

        'electricity_charges' => 'decimal:2',

        'cleaning_charges' => 'decimal:2',

        'security_deposit' => 'decimal:2',

    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getDisplayNameAttribute(): string
    {
        return $this->hall_code . ' - ' . $this->name;
    }

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}