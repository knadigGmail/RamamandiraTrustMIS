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
       Schema::create('sevas', function (Blueprint $table) {

    $table->id();

    $table->string('seva_code')->unique();

    $table->string('seva_name');

    $table->string('category')->nullable();

    $table->decimal('suggested_amount', 12, 2)->default(0);

    $table->decimal('minimum_amount', 12, 2)->default(0);

    $table->boolean('receipt_required')->default(true);

    $table->boolean('is_active')->default(true);

    $table->text('description')->nullable();

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sevas');
    }
};
