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
        Schema::create('cars', function (Blueprint $table) {
           
            $table->id();
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->string('color');
            $table->string('license_plate');
            $table->unsignedBigInteger('driver_id'); // hedhi thoto driver id fel table 
            $table->foreign('driver_id')->references('id')->on('drivers'); // w hedhi t3aref bih kima fel devoir naamlouha references ..
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};



/// stanenno ok nhel beb l youssef 