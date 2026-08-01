<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ledger_entries', function (Blueprint $table) {

            $table->id();

            $table->string('voucher_type',30);

            $table->unsignedBigInteger('voucher_id');

            $table->date('entry_date');

            $table->foreignId('account_head_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('financial_account_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->decimal('debit',14,2)->default(0);

            $table->decimal('credit',14,2)->default(0);

            $table->text('narration')->nullable();

            $table->timestamps();

            $table->index(['voucher_type','voucher_id']);
            $table->index('entry_date');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ledger_entries');
    }
};