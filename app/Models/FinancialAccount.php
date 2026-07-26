<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialAccount extends Model
{
    use HasFactory;

    protected $fillable = [

        'account_code',

        'account_name',

        'account_type',

        'bank_name',

        'branch',

        'account_holder',

        'account_number',

        'ifsc',

        'upi_id',

        'qr_code',

        'opening_balance',

        'is_default',

        'is_active',

        'remarks',
    ];

    protected $casts = [

        'opening_balance' => 'decimal:2',

        'is_default' => 'boolean',

        'is_active' => 'boolean',
    ];

    public function getDisplayNameAttribute()
    {
        return "{$this->account_name} ({$this->account_type})";
    }

    public function scopeActive($query)
{
    return $query->where('is_active', true);
}

public function scopeDefault($query)
{
    return $query->where('is_default', true);
}

public function scopeBanks($query)
{
    return $query->where('account_type', 'Bank');
}
public function getQrCodeUrlAttribute()
{
    if (!$this->qr_code) {
        return null;
    }

    return asset('storage/'.$this->qr_code);
}
}