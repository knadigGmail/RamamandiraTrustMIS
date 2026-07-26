<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->foreignId('customer_id')
                  ->after('id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('hall_id')
                  ->after('customer_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('booking_no')->unique();

            $table->date('booking_date');

            $table->date('function_date');

            $table->string('function_name');

            $table->string('function_type')->nullable();

            $table->decimal('hall_rent',12,2)->default(0);

            $table->decimal('security_deposit',12,2)->default(0);

            $table->decimal('electricity_charges',12,2)->default(0);

            $table->decimal('cleaning_charges',12,2)->default(0);

            $table->decimal('total_amount',12,2)->default(0);

            $table->decimal('advance_amount',12,2)->default(0);

            $table->decimal('balance_amount',12,2)->default(0);

            $table->enum('status',[
                'Tentative',
                'Confirmed',
                'Completed',
                'Cancelled'
            ])->default('Tentative');

            $table->text('remarks')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->dropConstrainedForeignId('customer_id');
            $table->dropConstrainedForeignId('hall_id');

            $table->dropColumn([
                'booking_no',
                'booking_date',
                'function_date',
                'function_name',
                'function_type',
                'hall_rent',
                'security_deposit',
                'electricity_charges',
                'cleaning_charges',
                'total_amount',
                'advance_amount',
                'balance_amount',
                'status',
                'remarks',
            ]);

        });
    }
};