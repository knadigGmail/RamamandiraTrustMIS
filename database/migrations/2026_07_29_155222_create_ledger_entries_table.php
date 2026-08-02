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

            $table->date('voucher_date');

            $table->string('voucher_type',30);

            $table->string('voucher_no',50);

            $table->foreignId('account_head_id')->constrained();

            $table->foreignId('financial_account_id')->nullable()->constrained();

            $table->decimal('debit',15,2)->default(0);

            $table->decimal('credit',15,2)->default(0);

            $table->string('reference')->nullable();

            $table->text('narration')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ledger_entries');
    }
};