<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {

            if (!Schema::hasColumn('donations', 'receipt_no')) {
                $table->string('receipt_no')->nullable()->unique()->after('id');
            }

            if (!Schema::hasColumn('donations', 'receipt_date')) {
                $table->date('receipt_date')->nullable()->after('receipt_no');
            }

            if (!Schema::hasColumn('donations', 'receipt_print_count')) {
                $table->integer('receipt_print_count')->default(0);
            }

        });
    }

    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {

            $table->dropColumn([
                'receipt_no',
                'receipt_date',
                'receipt_print_count',
            ]);

        });
    }
};