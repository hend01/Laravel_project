<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';
    protected $fillable = ['user_id', 'note', 'driver_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
    public function avis()
    {
        return $this->hasMany(Avis::class, 'evaluation_id');
    }

    use HasFactory;
}
