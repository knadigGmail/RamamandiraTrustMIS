<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('receipt_vouchers', function (Blueprint $table) {

            $table->id();

            $table->string('voucher_no')->unique();

            $table->date('voucher_date');

            $table->string('received_from');

            $table->foreignId('account_head_id')
                  ->constrained('account_heads');

            $table->foreignId('financial_account_id')
                  ->constrained('financial_accounts');

            $table->decimal('amount', 14, 2);

            $table->enum('receipt_mode', [
                'Cash',
                'Cheque',
                'NEFT',
                'RTGS',
                'UPI',
            ]);

            $table->string('reference_no')->nullable();

            $table->text('narration')->nullable();

            $table->string('attachment')->nullable();

            $table->enum('status', [
                'Draft',
                'Approved',
                'Cancelled'
            ])->default('Draft');

            $table->foreignId('created_by')->nullable();

            $table->foreignId('approved_by')->nullable();

            $table->timestamp('approved_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('receipt_vouchers');
    }
};