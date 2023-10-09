<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'kilometrage', // Add 'kilometrage' to the fillable array
        'date_entretien',
        'description',
    ];
   
public function car()
{
    return $this->belongsTo(Car::class);
}

}
