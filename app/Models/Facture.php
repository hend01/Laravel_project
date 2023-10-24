<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_facture',
        'date_facture',
        'montant',
        'nom_client',
        'adresse_client',
        'email_client',
        'numero_client',
        'nom_marchand',
        'adresse_marchand',
        'telephone_marchand',
        'email_marchand',
        'total',
        'date_echeance',
        'methode_paiement',
        'remarques',
        'statut_paiement',
        // Ajoutez d'autres propriétés ici en fonction des colonnes de votre table
    ];
}
