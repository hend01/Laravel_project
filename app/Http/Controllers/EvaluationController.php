<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::all(); // Récupère toutes les évaluations

        return view('admin.evaluations.index', compact('evaluations'));
    }

    public function create()
    {
        // Code pour la méthode "create" (par exemple, afficher un formulaire de création)
    }

    public function store(Request $request)
    {
        // Code pour la méthode "store" (traiter le formulaire de création)
    }

    public function show($id)
    {
        // Code pour la méthode "show" (afficher une ressource individuelle)
    }

    public function edit($id)
    {
        // Code pour la méthode "edit" (afficher un formulaire de modification)
    }

    public function update(Request $request, $id)
    {
        // Code pour la méthode "update" (traiter le formulaire de modification)
    }

    public function destroy($id)
    {
        // Code pour la méthode "destroy" (supprimer une ressource)
    }
}
