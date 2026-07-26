<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->id();

            $table->string('employee_code')->unique();

            $table->string('name');

            $table->string('father_spouse_name')->nullable();

            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();

            $table->string('designation')->nullable();

            $table->string('mobile',20)->nullable();

            $table->string('email')->nullable();

            $table->decimal('salary',10,2)->default(0);

            $table->date('joining_date')->nullable();

            $table->string('photo')->nullable();

            $table->boolean('status')->default(true);

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};