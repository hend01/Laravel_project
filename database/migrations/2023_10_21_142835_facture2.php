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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();  // Colonne d'ID auto-incrémenté
            $table->string('numero_facture'); // Numéro de facture
            $table->date('date_facture'); // Date de la facture
            $table->decimal('montant', 10, 2); // Montant de la facture
            $table->string('nom_client'); // Nom du client
            $table->string('adresse_client')->nullable(); // Adresse du client (peut être nul)
            $table->string('email_client')->nullable(); // Adresse e-mail du client (peut être nul)
            $table->string('numero_client')->nullable(); // Numéro d'identification du client (peut être nul)
            $table->string('nom_marchand'); // Nom du marchand
            $table->string('adresse_marchand')->nullable(); // Adresse du marchand (peut être nul)
            $table->string('telephone_marchand')->nullable(); // Numéro de téléphone du marchand (peut être nul)
            $table->string('email_marchand')->nullable(); // Adresse e-mail du marchand (peut être nul)
            $table->decimal('total', 10, 2); // Total de la facture
            $table->date('date_echeance'); // Date d'échéance
            // Ajoutez d'autres colonnes au besoin

            $table->timestamps(); // Horodatages created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');

        //
    }
};
