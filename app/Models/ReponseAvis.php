<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReponseAvis extends Model
{
    protected $table = 'reponses_avis';
    protected $fillable = ['contenu', 'avis_id'];

    public function avis()
    {
        return $this->belongsTo(Avis::class, 'avis_id');
    }

    use HasFactory;
}
