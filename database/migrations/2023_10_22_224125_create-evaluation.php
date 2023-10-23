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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('user_id'); // Clé étrangère pour l'utilisateur qui a fait l'évaluation.
            $table->unsignedTinyInteger('note'); // Utilisez un type de données approprié pour stocker le nombre d'étoiles.

            // Clés étrangères
            $table->unsignedBigInteger('driver_id'); // Clé étrangère pour le chauffeur évalué.
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
