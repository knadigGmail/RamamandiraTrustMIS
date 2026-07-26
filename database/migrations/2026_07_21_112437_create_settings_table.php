<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->id();

            // Trust Information
            $table->string('trust_name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();

            // Receipt
            $table->string('receipt_prefix')->default('RT');
            $table->text('receipt_footer')->nullable();
            $table->text('blessing_message')->nullable();

            // Email
            $table->string('reply_to_email')->nullable();

            // WhatsApp
            $table->string('whatsapp_number')->nullable();
            $table->text('whatsapp_message')->nullable();

            // Bank Details
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('account_number')->nullable();
            $table->string('ifsc')->nullable();
            $table->string('upi_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};