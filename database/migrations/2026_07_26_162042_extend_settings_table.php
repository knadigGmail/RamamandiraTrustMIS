<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->string('trust_name_kn')->nullable()->after('trust_name');

            $table->string('registration_no')->nullable()->after('trust_name_kn');
            $table->string('pan_no')->nullable()->after('registration_no');
            $table->string('gst_no')->nullable()->after('pan_no');

            $table->string('village')->nullable()->after('address');
            $table->string('taluk')->nullable()->after('village');
            $table->string('district')->nullable()->after('taluk');
            $table->string('state')->nullable()->after('district');
            $table->string('pincode')->nullable()->after('state');

            $table->string('mobile')->nullable()->after('phone');

            $table->string('signature')->nullable()->after('logo');
            $table->string('qr_code')->nullable()->after('signature');

            $table->string('financial_year')->nullable();
            $table->string('currency')->default('INR');
            $table->string('timezone')->default('Asia/Kolkata');

        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->dropColumn([
                'trust_name_kn',
                'registration_no',
                'pan_no',
                'gst_no',
                'village',
                'taluk',
                'district',
                'state',
                'pincode',
                'mobile',
                'signature',
                'qr_code',
                'financial_year',
                'currency',
                'timezone',
            ]);

        });
    }
};