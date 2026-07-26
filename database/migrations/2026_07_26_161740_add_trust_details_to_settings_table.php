<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            // General
            $table->string('trust_name')->nullable();
            $table->string('trust_name_kn')->nullable();

            $table->string('registration_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('gst_no')->nullable();

            // Contact
            $table->text('address')->nullable();
            $table->string('village')->nullable();
            $table->string('taluk')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();

            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            // Branding
            $table->string('logo')->nullable();
            $table->string('signature')->nullable();
            $table->string('qr_code')->nullable();

            $table->text('receipt_footer')->nullable();

            // Finance
            $table->string('financial_year')->nullable();
            $table->string('currency')->default('INR');
            $table->string('timezone')->default('Asia/Kolkata');

        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->dropColumn([
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

                'receipt_footer',

                'financial_year',
                'currency',
                'timezone'
            ]);

        });
    }
};