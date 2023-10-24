<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class event extends Model
{
    use HasFactory;
    protected $table = 'event';

    protected $fillable = [
        'name',
        'description',
        'produit_number',
        'event_type',
        'id_user',
        
    ];

    public function user(): HasMany
    {
        return $this->hasMany(user::class);
    }

    public function produit()
    {
        return $this->belongsToMany(produit::class,'event_produit', 'event_id', 'produit_id');
    }
    public function usere()
    {
        return $this->belongsToMany(user::class,'event_user', 'event_id', 'user_id');
    }
}
