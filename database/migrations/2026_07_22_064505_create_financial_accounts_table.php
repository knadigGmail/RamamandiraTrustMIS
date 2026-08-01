<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('financial_accounts', function (Blueprint $table) {

            $table->foreignId('account_head_id')
                ->nullable()
                ->after('account_type')
                ->constrained('account_heads')
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('financial_accounts', function (Blueprint $table) {

            $table->dropConstrainedForeignId('account_head_id');

        });
    }
};