<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;

    protected $table = 'reclamations';

    protected $fillable = ['sujet', 'description','id_user'];

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }

    public function user()
{
    return $this->belongsTo(User::class, 'id_user');
}



}
