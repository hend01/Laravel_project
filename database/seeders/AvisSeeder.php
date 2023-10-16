<?php

namespace Database\Seeders;

use App\Models\Avis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Avis::create([
            'commentaire' => "C'était un excellent service !",
            'evaluation_id' => 4, // Assurez-vous que l'ID de l'évaluation existe
        ]);

        // Ajoutez d'autres avis si nécessaire
    }
}
