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
       Schema::create('donations', function (Blueprint $table) {

    $table->id();

    $table->string('receipt_no')->unique();

    $table->date('receipt_date');

    $table->foreignId('donor_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->foreignId('seva_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->foreignId('financial_account_id')
          ->constrained('financial_accounts')
          ->cascadeOnDelete();

    $table->enum('payment_mode', [
        'Cash',
        'Bank',
        'UPI',
        'Cheque'
    ]);

    $table->decimal('amount', 12, 2);

    $table->string('transaction_reference')->nullable();

    $table->text('remarks')->nullable();

    $table->boolean('receipt_printed')->default(false);

    $table->boolean('is_cancelled')->default(false);

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
