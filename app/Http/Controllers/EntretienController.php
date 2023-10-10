<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Entretien;

class EntretienController extends Controller
{
     public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'car_id' => 'required|exists:cars,id', // Assurez-vous que car_id existe dans la table cars
            'kilometrage' => 'required|numeric',
            'date_entretien' => 'required|date',
            'description' => 'required|string',
        ]);

        // Créer un nouvel entretien avec les données validées
        $entretien = Entretien::create($validatedData);

        // Rediriger vers la page de détails de l'entretien nouvellement créé
        return redirect()->route('admin.entretiens.index')->with('success', 'Entretien créé avec succès.');
    }
   
    public function index()
    {
        $entretiens = Entretien::all();
        return view('admin.entretiens.index', compact('entretiens'));
    }

    public function create()
    {
        $cars = Car::all(); // Récupérez la liste des voitures à partir de votre modèle Car
        return view('admin.entretiens.create', compact('cars'));
    }

    public function addTestData()
    {
        $car = Car::find(1);

        $entretien = new Entretien([
            'kilometrage' => 10000,
            'date_entretien' => '2023-10-10',
            'description' => 'Regular maintenance',
        ]);

        $car->entretiens()->save($entretien);

        return redirect()->route('admin.entretiens.index')->with('success', 'Test data added successfully.');
    }

    public function show($id)
    {
        $entretien = Entretien::findOrFail($id);
        return view('admin.entretiens.show', compact('entretien'));
    }

    public function edit($id)
    {
        $entretien = Entretien::findOrFail($id);
        $cars = Car::all(); // Récupérez la liste des voitures à partir de votre modèle Car
        return view('admin.entretiens.edit', compact('entretien', 'cars'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kilometrage' => 'required|numeric',
            'date_entretien' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $entretien = Entretien::findOrFail($id);
        $entretien->update($validatedData);

        return redirect()->route('admin.entretiens.index')->with('success', 'Entretien modifié avec succès.');
    }

    public function destroy($id)
    {
        $entretien = Entretien::findOrFail($id);
        $entretien->delete();
    
        return response()->json(['message' => 'Entretien supprimé avec succès'], 200);
    }
    

}
