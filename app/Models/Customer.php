<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [

        'customer_code',
        'photo',

        'name',
        'father_spouse_name',
        'gender',
        'date_of_birth',

        'mobile',
        'alternate_mobile',
        'email',

        'aadhaar_no',
        'pan_no',

        'address',
        'city',
        'state',
        'pincode',

        'gotra',
        'family_name',

        'is_donor',
        'is_devotee',
        'is_life_member',

        'status',

        'remarks',
    ];

    protected $casts = [

        'date_of_birth' => 'date',

        'is_donor' => 'boolean',
        'is_devotee' => 'boolean',
        'is_life_member' => 'boolean',

        'status' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getFullAddressAttribute(): string
    {
        return collect([
            $this->address,
            $this->city,
            $this->state,
            $this->pincode,
        ])
        ->filter()
        ->implode(', ');
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeDonors($query)
    {
        return $query->where('is_donor', true);
    }

    public function scopeLifeMembers($query)
    {
        return $query->where('is_life_member', true);
    }
    public function bookings()
{
    return $this->hasMany(Booking::class);
}
}