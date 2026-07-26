<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberSeries extends Model
{
    use HasFactory;

    protected $fillable = [

        'module',

        'financial_year',

        'prefix',

        'last_number',

        'is_active',

    ];

    protected $casts = [

        'last_number' => 'integer',

        'is_active' => 'boolean',

    ];
}