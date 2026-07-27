<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            if (!Schema::hasColumn('settings', 'trust_name_kn'))
                $table->string('trust_name_kn')->nullable()->after('trust_name');

            if (!Schema::hasColumn('settings', 'registration_no'))
                $table->string('registration_no')->nullable();

            if (!Schema::hasColumn('settings', 'pan_no'))
                $table->string('pan_no')->nullable();

            if (!Schema::hasColumn('settings', 'gst_no'))
                $table->string('gst_no')->nullable();

            if (!Schema::hasColumn('settings', 'village'))
                $table->string('village')->nullable();

            if (!Schema::hasColumn('settings', 'taluk'))
                $table->string('taluk')->nullable();

            if (!Schema::hasColumn('settings', 'district'))
                $table->string('district')->nullable();

            if (!Schema::hasColumn('settings', 'state'))
                $table->string('state')->nullable();

            if (!Schema::hasColumn('settings', 'pincode'))
                $table->string('pincode')->nullable();

            if (!Schema::hasColumn('settings', 'mobile'))
                $table->string('mobile')->nullable();

            if (!Schema::hasColumn('settings', 'signature'))
                $table->string('signature')->nullable();

            if (!Schema::hasColumn('settings', 'qr_code'))
                $table->string('qr_code')->nullable();

            if (!Schema::hasColumn('settings', 'financial_year'))
                $table->string('financial_year')->nullable();

            if (!Schema::hasColumn('settings', 'currency'))
                $table->string('currency')->default('INR');

            if (!Schema::hasColumn('settings', 'timezone'))
                $table->string('timezone')->default('Asia/Kolkata');

        });
    }

    public function down(): void
    {
        // Leave empty during development
    }
};