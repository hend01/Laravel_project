<?php

namespace App\Http\Controllers;
use App\Models\Reclamation;


use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function index()
    {
        $reclamations = Reclamation::all();
        return view('admin.reclamation.index', compact('reclamations'));
    }

    public function create()
    {
        return view('front.addReclamation');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sujet' => 'required|string|max:255',
            'description' => 'required|string|min:20',
        ]);

        if (auth()->check()) {
            $userId = auth()->user()->id;

            Reclamation::create([
                'sujet' => $request->input('sujet'),
                'description' => $request->input('description'),
                'id_user' => $userId,
            ]);

            return redirect()->route('home')
                ->with('success', 'Réclamation créée avec succès.');
        } else {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer une réclamation.');
        }
    }



    public function edit(Reclamation $reclamation)
    {
        return view('reclamations.edit', compact('reclamation'));
    }

    public function update(Request $request, Reclamation $reclamation)
    {
        $request->validate([
            'sujet' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $reclamation->update($request->all());

        return redirect()->route('reclamations.index')
            ->with('success', 'Reclamation mise à jour avec succès.');
    }

    public function destroy(Reclamation $reclamation)
    {
        $reclamation->delete();

        return redirect()->route('reclamations.index')
            ->with('success', 'Reclamation supprimée avec succès.');
    }

    public function destroyfront(Reclamation $reclamation)
    {
        $reclamation->delete();

        return redirect()->route('home')
            ->with('success', 'Reclamation supprimée avec succès.');
    }


    public function mesReclamations()
    {
        $user = auth()->user();
        $reclamations = $user->reclamations;

        return view('front.reclamation.show', compact('reclamations'));
    }

}
