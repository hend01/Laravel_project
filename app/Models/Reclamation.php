<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;

    protected $table = 'reclamations';

    protected $fillable = ['sujet', 'description'];

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }


}
