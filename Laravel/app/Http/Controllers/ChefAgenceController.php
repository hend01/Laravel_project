<?php


namespace App\Http\Controllers;

use App\Models\ChefAgence;
use App\Models\AgenceLocation;

use Illuminate\Http\Request;

class ChefAgenceController extends Controller
{
    public function index()
    {
        $chefs = ChefAgence::with('agenceLocation')->get();
        return view('admin.chefs.index', compact('chefs'));
    }

    public function create()
    {
        $agencies = AgenceLocation::all();
        return view('admin.chefs.create', compact('agencies'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:chefs_agence,email',
            'address' => 'nullable',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable',
            'national_id' => 'nullable|regex:/^[A-Z]{3}\d{8}$/',
            'agency_id' => 'required|exists:agence_location,id',
        ]);
    
        ChefAgence::create($validatedData);
    
        return redirect(route('chefs.index'))->with('success', 'Chef ajouté avec succès.');
    }
    
  public function show(ChefAgence $chef)
    {
        return view('admin.chefs.show', compact('chef'));
    }

    public function edit(ChefAgence $chef)
    {
        return view('admin.chefs.edit', compact('chef'));
    }
   
    public function update(Request $request, ChefAgence $chef)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'address' => 'nullable',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable',
            'national_id' => 'nullable',
        ]);
    
        // Now update the chef
        $chef->update($validatedData);
    
        return redirect(route('chefs.index'))->with('success', 'Chef d\'agence mis à jour avec succès.');
    }
    
    
    

    public function destroy(ChefAgence $chef)
    {
        $chef->delete();

        return redirect(route('chefs.index'))->with('success', 'Chef d\'agence supprimé avec succès.');
    }
}
