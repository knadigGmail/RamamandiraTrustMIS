<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountHead extends Model
{
    protected $fillable = [

        'account_code',

        'account_name',

        'account_type',

        'parent_id',

        'description',

        'is_active',

    ];

    public function parent()
    {
        return $this->belongsTo(AccountHead::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(AccountHead::class,'parent_id');
    }
}