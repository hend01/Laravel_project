<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    // Les attributs que vous voulez ajouter
    protected $fillable = [
        'nom',
        'adresse',
        // Ajoutez d'autres attributs ici au besoin
    ];
}
