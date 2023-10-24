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
        Schema::create('reponses_avis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('avis_id');
            $table->text('contenu');
            // Clé étrangère
            $table->foreign('avis_id')->references('id')->on('avis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponses');
    }
};
