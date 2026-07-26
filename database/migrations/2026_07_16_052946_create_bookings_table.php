<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->string('booking_no')->nullable()->after('id');

            $table->date('booking_date')->nullable();

            $table->string('customer_name')->nullable();

            $table->string('hall_name')->nullable();

            $table->string('function_type')->nullable();

            $table->date('function_date')->nullable();

            $table->integer('guest_count')->default(0);

            $table->integer('rooms_required')->default(0);

            $table->dateTime('checkin_datetime')->nullable();

            $table->dateTime('checkout_datetime')->nullable();

            $table->decimal('hall_charges',12,2)->default(0);

            $table->decimal('security_deposit',12,2)->default(0);

            $table->decimal('advance_amount',12,2)->default(0);

            $table->decimal('balance_amount',12,2)->default(0);

            $table->string('status')->default('Booked');

            $table->text('remarks')->nullable();

            $table->string('customer_photo')->nullable();

            $table->string('aadhaar_copy')->nullable();

            $table->string('agreement_copy')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->dropColumn([
                'booking_no',
                'booking_date',
                'customer_name',
                'hall_name',
                'function_type',
                'function_date',
                'guest_count',
                'rooms_required',
                'checkin_datetime',
                'checkout_datetime',
                'hall_charges',
                'security_deposit',
                'advance_amount',
                'balance_amount',
                'status',
                'remarks',
                'customer_photo',
                'aadhaar_copy',
                'agreement_copy'
            ]);
        });
    }
};