<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\driver;
use App\Models\Evaluation;
use App\Models\ReponseAvis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AvisController extends Controller
{
    public function index()
    {
        $aviss = Avis::all(); // Récupère toutes les évaluations

        return view('admin.avis.index', compact('aviss'));
    }
    public function destroy($id)
    {
        $avis = Avis::find($id);
        if (!$avis) {
            return redirect('/avis')->with('error', 'Avis not found.');
        }
        // Récupérez toutes les réponses associées à l'avis
        $reponses = ReponseAvis::where('avis_id', $avis->id)->get();

        // Supprimez chaque réponse
        foreach ($reponses as $reponse) {
            $reponse->delete();
        }
        $avis->delete();

        return redirect('/avis')->with('success', 'Avis has been deleted successfully.');
    }

    public function store(Request $request)
    {
        // Récupérez les données du formulaire
        $comment = $request->input('comment');
        $evaluationId = $request->input('evaluation_id');


        // Créez une nouvelle évaluation en utilisant Eloquent
        $avis = new Avis();
        $avis->commentaire = $comment;
        $avis->evaluation_id = $evaluationId;

        $avis->save();
        return response()->json(['message' => 'Evaluation saved successfully']);
    }
    public function showDriverReviews($driverId)
    {
        $driver = Driver::findOrFail($driverId);
        $evaluations = Evaluation::where('driver_id', $driverId)->get();
        $averageRating = $evaluations->avg('note');

        $reviews = Avis::whereHas('evaluation', function ($query) use ($driverId) {
            $query->where('driver_id', $driverId);
        })->get();

        return view('front.blog.blog',  compact('driver', 'reviews', 'averageRating'), ['driverId' => $driverId]);
    }
    public function addEvaluationAndAvis(Request $request)
    {

        // Retrieve data from the request
        $driverId = request()->route('driverId');

        // Check if the user has already rated the driver
        $rating = $request->input('rating');
     
        $request->validate(['comment' => 'required|string|min:10|max:255',
            'comment' => 'required|string|min:10',
        ], [
            'comment.required' => 'Comment field is required.',
            'comment.min' => 'Comment field must have at least 10 characters.',
        ]);
       
        // Perform the necessary actions to add an evaluation and avis simultaneously
        // Add evaluation (similar to your existing 'add-evaluation' method)
        $evaluation = new Evaluation();
        $evaluation->driver_id = $driverId;
        $evaluation->note = $rating+1;
        $evaluation->user_id = auth()->user()->id; // Assuming you have user authentication       
        $evaluation->save();

        // Add avis
        $avis = new Avis();
        $avis->commentaire = $request->input('comment');
        $avis->evaluation_id = $evaluation->id; // Link avis to the newly created evaluation
        $avis->save();
        return response()->json(['message' => 'Evaluation and Avis added successfully']);
        
        }
       
}




