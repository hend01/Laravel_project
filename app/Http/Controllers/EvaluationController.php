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
        $driverId = request()->route('driverId');

        
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $evaluation->note = $rating + 1;
            $evaluation->driver_id = $driverId;
            $evaluation->user_id = $userId;
        } else {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter une evaluation .');
        }
        // Check if the user has already rated the driver
        $existingEvaluation = Evaluation::where('user_id', $evaluation->user_id)
        ->where('driver_id', $evaluation->driver_id)
        ->first();

        if ($existingEvaluation) {
            return response()->json(['message' => 'Sorry , you have already rated this driver.']);
        } else{
            $evaluation->save();
            return response()->json(['message' => 'Evaluation saved successfully']);

        }
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
        $evaluation = Evaluation::find($id);
        if (!$evaluation) {
            return redirect('/evaluations')->with('error', 'Evaluation not found.');
        }

        $evaluation->delete();

        return redirect('/evaluations')->with('success', 'The evaluation has been deleted successfully.');
    }
    
}
