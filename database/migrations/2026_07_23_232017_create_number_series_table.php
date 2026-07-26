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
        Schema::create('number_series', function (Blueprint $table) {

    $table->id();

    $table->string('module',50);

    $table->string('financial_year',20);

    $table->string('prefix',20);

    $table->unsignedBigInteger('last_number')->default(0);

    $table->boolean('is_active')->default(true);

    $table->timestamps();

    $table->unique(['module','financial_year']);

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('number_series');
    }
};
