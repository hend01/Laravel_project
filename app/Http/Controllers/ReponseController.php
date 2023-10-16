<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReponseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'contenu' => 'required|string',
            'reclamation_id' => 'required|exists:reclamations,id',
        ]);

        Reponse::create($request->all());

        return redirect()->route('reclamations.show', $request->reclamation_id)
            ->with('success', 'Reponse ajoutée avec succès.');
    }

    public function destroy(Reponse $reponse)
    {
        $reponse->delete();

        return redirect()->route('reclamations.show', $reponse->reclamation_id)
            ->with('success', 'Reponse supprimée avec succès.');
    }}
