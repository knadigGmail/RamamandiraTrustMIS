<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public const STATUS_TENTATIVE = 'Tentative';

public const STATUS_CONFIRMED = 'Confirmed';

public const STATUS_COMPLETED = 'Completed';

public const STATUS_CANCELLED = 'Cancelled';
    protected $fillable = [

        'booking_no',
        'booking_date',

        'customer_id',
        'hall_id',

        'function_date',
        'function_type',

        'guest_count',

        'checkin_datetime',
        'checkout_datetime',

        'rooms_required',

        'hall_rent',
        'security_deposit',
        'electricity_charges',
        'cleaning_charges',

        'total_amount',
        'advance_amount',
        'balance_amount',

        'customer_photo',
        'aadhaar_copy',
        'agreement_copy',

        'status',
        'remarks',
    ];

    protected $casts = [

        'booking_date' => 'date',
        'function_date' => 'date',

        'checkin_datetime' => 'datetime',
        'checkout_datetime' => 'datetime',

        'hall_rent' => 'decimal:2',
        'security_deposit' => 'decimal:2',
        'electricity_charges' => 'decimal:2',
        'cleaning_charges' => 'decimal:2',

        'total_amount' => 'decimal:2',
        'advance_amount' => 'decimal:2',
        'balance_amount' => 'decimal:2',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
    public function getOutstandingAmountAttribute()
{
    return $this->total_amount - $this->advance_amount;
}

}