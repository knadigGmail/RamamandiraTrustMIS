<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [

        'trust_name',
        'trust_name_kn',

        'registration_no',
        'pan_no',
        'gst_no',

        'address',
        'village',
        'taluk',
        'district',
        'state',
        'pincode',

        'phone',
        'mobile',
        'email',
        'website',

        'logo',
        'signature',
        'qr_code',

        'bank_name',
        'branch',
        'account_number',
        'ifsc',
        'upi_id',

        'receipt_prefix',
        'receipt_footer',
        'blessing_message',

        'reply_to_email',
        'whatsapp_number',
        'whatsapp_message',

        'financial_year',
        'currency',
        'timezone',
    ];

    public static function getSettings()
    {
        return self::firstOrCreate([]);
    }
    public function index(DashboardService $dashboard)
{
    $data = $dashboard->getDashboardData();

    $data['settings'] = Setting::first();

    return view('dashboard', $data);
}
}