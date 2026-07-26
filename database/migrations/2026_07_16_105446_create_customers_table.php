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
    Schema::create('customers', function (Blueprint $table) {

        $table->id();

        // Customer Information
        $table->string('customer_code', 20)->unique();
        $table->string('name', 150);
        $table->string('father_spouse_name', 150)->nullable();
        $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
        $table->date('date_of_birth')->nullable();

        // Contact Information
        $table->string('mobile', 20);
        $table->string('alternate_mobile', 20)->nullable();
        $table->string('email')->nullable();

        // Identity
        $table->string('aadhaar_no', 20)->nullable();
        $table->string('pan_no', 20)->nullable();

        // Address
        $table->text('address')->nullable();
        $table->string('city', 100)->nullable();
        $table->string('state', 100)->nullable();
        $table->string('pincode', 10)->nullable();

        // Family Information
        $table->string('gotra', 100)->nullable();
        $table->string('family_name', 100)->nullable();

        // Photo
        $table->string('photo')->nullable();

        // Future Integration
        $table->boolean('is_donor')->default(false);
        $table->boolean('is_devotee')->default(false);
        $table->boolean('is_life_member')->default(false);

        // Status
        $table->boolean('status')->default(true);

        $table->text('remarks')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
