<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 'avis';
    protected $fillable = ['commentaire', 'evaluation_id'];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, 'evaluation_id');
    }
    public function reponses()
    {
        return $this->hasMany(ReponseAvis::class, 'avis_id');
    }

    use HasFactory;
}
