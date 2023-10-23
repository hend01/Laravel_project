<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Evaluation::create([
            'user_id' => 1,
            'note' => 4,
            'driver_id' => 2,
        ]);

        // Ajoutez d'autres évaluations si nécessaire
    }
}
