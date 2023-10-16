<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    public function index()
    {
        $aviss = Avis::all(); // Récupère toutes les évaluations

        return view('admin.avis.index', compact('aviss'));
    }
}
