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
        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluation_id'); // Clé étrangère pour l'évaluation associée à cet avis.
            $table->text('commentaire'); // Le commentaire lié à l'évaluation.

            // Clé étrangère
            $table->foreign('evaluation_id')->references('id')->on('evaluation');
            $table->timestamps();
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
