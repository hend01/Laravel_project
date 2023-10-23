<?php

namespace App\Http\Controllers;
use App\Models\Reclamation;
use App\Models\Reponse;

use Illuminate\Http\Request;

class ReponseController extends Controller
{
    public function index()
    {
        $reponses = Reponse::all();
        return view('admin.reponse.index', compact('reponses'));
    }

    public function create(Request $request)
    {
        $reclamation = Reclamation::find($request->input('reclamation_id'));
        return view('admin.reponse.create', ['reclamation' => $reclamation]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'contenu' => 'required|string',
            'reclamation_id' => 'required|exists:reclamations,id', // Assurez-vous que la relation existe
        ]);

        Reponse::create([
            'contenu' => $request->input('contenu'),
            'reclamation_id' => $request->input('reclamation_id'),
        ]);

        return redirect()->route('reclamations.index', $request->input('reclamation_id'))
            ->with('success', 'Réponse ajoutée avec succès.');
    }



    public function edit(Reponse $reponse)
    {
        $reclamation = $reponse->reclamation;
        return view('admin.reponse.update', compact('reponse', 'reclamation'));
        }

    public function update(Request $request, Reponse $reponse)
    {
        $request->validate([
            'contenu' => 'required|string',
        ]);

        $reponse->update([
            'contenu' => $request->input('contenu'),
        ]);

        return redirect()->route('admin.reponses.index')
            ->with('success', 'Réponse mise à jour avec succès.');
    }

    public function destroy(Reponse $reponse)
    {
        $reponse->delete();
        return redirect()->route('admin.reponses.index');
    }

    public function show(Reponse $reponse)
    {
    return view('admin.reponse.show', compact('reponse'));
    }



}
