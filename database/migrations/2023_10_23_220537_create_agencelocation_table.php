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
        Schema::create('agencelocation', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Name of the agency
            $table->string('address');  // Address of the agency
            $table->string('phone_number')->nullable();  // Phone number of the agency
            $table->string('email')->unique();  // Email address of the agency
            $table->text('description')->nullable();  // Desc
            $table->timestamps(); // This will add 'created_at' and 'updated_at' columns

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencelocation');
    }
};
