<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('financial_accounts', function (Blueprint $table) {

            $table->id();

            $table->string('account_code')->unique();

            $table->string('account_name');

            $table->enum('account_type', [
                'Bank',
                'Cash',
                'UPI'
            ]);

            $table->string('bank_name')->nullable();

            $table->string('branch')->nullable();

            $table->string('account_holder')->nullable();

            $table->string('account_number')->nullable();

            $table->string('ifsc')->nullable();

            $table->string('upi_id')->nullable();

            $table->string('qr_code')->nullable();

            $table->decimal('opening_balance', 14, 2)->default(0);

            $table->boolean('is_default')->default(false);

            $table->boolean('is_active')->default(true);

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('financial_accounts');
    }
};