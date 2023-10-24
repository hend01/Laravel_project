<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefAgence extends Model
{
    protected $fillable = [ 'nom',
    'prenom',
    'email',
    'address',
    'date_of_birth',
    'gender',
    'national_id',
    'nom_de_agence',
    'agency_id', ];

    protected $table = 'chefagence';
    use HasFactory;

    public function agenceLocation()
    {
        return $this->belongsTo(AgenceLocation::class,'agency_id');
    }}
