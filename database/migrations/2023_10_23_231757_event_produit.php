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
        Schema::create('event_produit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('event_id')->unsigned();
            $table->unsignedBiginteger('produit_id')->unsigned();

            $table->foreign('event_id')->references('id')
                 ->on('event')->onDelete('cascade');
            $table->foreign('produit_id')->references('id')
                ->on('produit')->onDelete('cascade');

            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_produit');
    }
};
