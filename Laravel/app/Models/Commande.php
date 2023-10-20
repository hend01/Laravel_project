<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_commande',
        'client_id',
        'produit_id',
        'quantite',
        'prix_unitaire',
        'montant_total',
    ];

}
