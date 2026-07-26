<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seva extends Model
{
    use HasFactory;

    protected $fillable = [

        'seva_code',

        'seva_name',

        'category',

        'suggested_amount',

        'minimum_amount',

        'receipt_required',

        'is_active',

        'description',

    ];

    protected $casts = [

        'suggested_amount' => 'decimal:2',

        'minimum_amount' => 'decimal:2',

        'receipt_required' => 'boolean',

        'is_active' => 'boolean',

    ];
}