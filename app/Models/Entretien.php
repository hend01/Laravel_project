<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'car_id',
        'kilometrage',
        'date_entretien',
        'description',
    ];
        
    public static $rules = [
        'car_id' => 'required|exists:cars,id',
        'kilometrage' => 'required|integer|min:0', // Par exemple, ici, on exige que 'kilometrage' soit un entier non négatif.
        'date_entretien' => 'required|date',
        'description' => 'required',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
