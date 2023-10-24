<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenceLocation extends Model
{
    protected $table = 'agencelocation';

    use HasFactory;
    protected $fillable = [
        'name',          
        'address',       
        'phone_number',   
        'email',          
        'description',    
    ];

    public function chefs()
    {
        return $this->hasMany(ChefAgence::class);
    }}
