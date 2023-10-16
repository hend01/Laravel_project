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

    public function blog()
    {
        return view('front.blog.blog');
    }

    public function store(Request $request)
    {
        // Récupérez les données du formulaire
        $rating = $request->input('rating');

        // Créez une nouvelle évaluation en utilisant Eloquent
        $evaluation = new Evaluation();
        $evaluation->note = $rating+1;
        $evaluation->driver_id = 2;
        $evaluation->user_id = 1;
        $evaluation->save();

        // Vous pouvez également gérer d'autres données ici, comme le commentaire

        // Répondez au client (facultatif)
        return response()->json(['message' => 'Évaluation enregistrée avec succès']);
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
