<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->integer('guest_count')
                  ->default(0)
                  ->after('function_type');

            $table->integer('rooms_required')
                  ->default(0)
                  ->after('guest_count');

            $table->dateTime('checkin_datetime')
                  ->nullable()
                  ->after('rooms_required');

            $table->dateTime('checkout_datetime')
                  ->nullable()
                  ->after('checkin_datetime');

            $table->string('customer_photo')
                  ->nullable()
                  ->after('balance_amount');

            $table->string('aadhaar_copy')
                  ->nullable()
                  ->after('customer_photo');

            $table->string('agreement_copy')
                  ->nullable()
                  ->after('aadhaar_copy');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->dropColumn([
                'guest_count',
                'rooms_required',
                'checkin_datetime',
                'checkout_datetime',
                'customer_photo',
                'aadhaar_copy',
                'agreement_copy',
            ]);

        });
    }
};