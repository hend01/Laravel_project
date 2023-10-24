<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;
    protected $table = 'produit';
    protected $fillable = [
        'name',
        'description',
        'prix',
        'offer',
        'id_user',
        
    ];
    public function produit()
    {
    return $this->belongsTo(event::class);
    }
    public function user()
    {
        return $this->hasMany(user::class);
    }
}
