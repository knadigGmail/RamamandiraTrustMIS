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
    Schema::create('trustees', function (Blueprint $table) {

        $table->id();

        $table->string('trustee_code',20)->unique();

        $table->string('name',150);

        $table->string('father_spouse_name',150)->nullable();

        $table->string('mobile',20)->nullable();

        $table->string('email',150)->nullable();

        $table->text('address')->nullable();

        $table->string('designation',100)->nullable();

        $table->date('joining_date')->nullable();

        $table->date('end_date')->nullable();

        $table->string('photo')->nullable();

        $table->boolean('status')->default(true);

        $table->text('remarks')->nullable();

        $table->foreignId('created_by')->nullable();

        $table->foreignId('updated_by')->nullable();

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trustees');
    }
};
