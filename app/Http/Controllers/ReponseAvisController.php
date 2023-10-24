<?php

namespace App\Http\Controllers;

use App\Models\ReponseAvis;

use Illuminate\Http\Request;

class ReponseAvisController extends Controller
{
        public function store(Request $request)
        {
        $driverId = request()->route('driverId');
            // Récupérez les données du formulaire
            $contenu = $request->input('reponse');
            $avis = $request->input('review_id');


            // Créez une nouvelle évaluation en utilisant Eloquent
            $reponse = new ReponseAvis();
            $reponse->contenu = $contenu;
            $reponse->avis_id = $avis;

            $reponse->save();
                return redirect('/driver/details/' . $driverId)->with('success', 'Reponse has been deleted successfully.');
        }
    public function destroy($id)
    {
        $driverId = request()->route('driverId');
        $reponse = ReponseAvis::find($id);
        if (!$reponse) {
            return redirect('/driver/detail/'. $driverId)->with('error', 'Reponse not found.');
        }

        $reponse->delete();

        return redirect('/driver/details/' . $driverId)->with('success', 'Reponse has been deleted successfully.');
    }
}
