<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('halls', function (Blueprint $table) {

            $table->id();

            $table->string('hall_code')->unique();
            $table->string('name');

            $table->integer('capacity')->default(0);

            $table->boolean('ac')->default(false);

            $table->integer('rooms')->default(0);

            $table->boolean('dining_hall')->default(false);

            $table->boolean('kitchen')->default(false);

            $table->decimal('rent',12,2)->default(0);

            $table->decimal('security_deposit',12,2)->default(0);

            $table->string('photo')->nullable();

            $table->boolean('status')->default(true);

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('halls');
    }
};