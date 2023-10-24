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
        Schema::create('entretiens', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('car_id'); // Change 'vehicle_id' to 'car_id'
            $table->integer('kilometrage');
            $table->date('date_entretien');
            $table->text('description')->nullable();
            $table->timestamps();

            // Update foreign key reference to 'cars' table
            $table->foreign('car_id')
            ->references('id')
                ->on('cars')
                ->onDelete('cascade'); // Delete associated maintenance records if the car is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entretiens');
    }
};
