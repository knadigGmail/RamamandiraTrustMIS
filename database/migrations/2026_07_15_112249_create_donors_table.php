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
        Schema::create('donors', function (Blueprint $table) {

            $table->id();

            $table->string('donor_code', 20)->unique();

            $table->string('name', 150);

            $table->string('father_spouse_name', 150)->nullable();

            $table->string('mobile', 20);

            $table->string('alternate_mobile', 20)->nullable();

            $table->string('email', 150)->nullable();

            $table->text('address')->nullable();

            $table->string('city', 100)->nullable();

            $table->string('state', 100)->nullable();

            $table->string('pincode', 10)->nullable();

            $table->string('pan_no', 20)->nullable();

            $table->string('aadhaar_no', 20)->nullable();

           $table->date('dob')->nullable();

$table->date('anniversary')->nullable();

$table->string('occupation', 100)->nullable();

/* Additional Trust Information */

$table->string('gotra', 100)->nullable();

$table->string('family_name', 100)->nullable();

$table->boolean('is_life_member')->default(false);

$table->string('membership_no', 30)->nullable();

/* Photo */

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
        Schema::dropIfExists('donors');
    }
};