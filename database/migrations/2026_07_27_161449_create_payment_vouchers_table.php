<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_vouchers', function (Blueprint $table) {

            $table->id();

            $table->string('voucher_no')->unique();

            $table->date('voucher_date');

            $table->foreignId('account_head_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('financial_account_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('payee_name');

            $table->decimal('amount', 12, 2);

            $table->text('narration')->nullable();

            $table->string('reference_no')->nullable();

            $table->string('attachment')->nullable();

            $table->enum('payment_mode', [
                'Cash',
                'Cheque',
                'NEFT',
                'RTGS',
                'UPI'
            ]);

            $table->enum('status', [
                'Draft',
                'Approved',
                'Cancelled'
            ])->default('Draft');

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users');

            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users');

            $table->timestamp('approved_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_vouchers');
    }
};