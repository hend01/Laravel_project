<?php

namespace App\Http\Controllers;
use App\Models\AgenceLocation;
use App\Models\ChefAgence;

use Illuminate\Http\Request;

class AgenceLocationController extends Controller
{
    public function index()
    {
        $agences= AgenceLocation::all();
        return view('admin.agences.index',['agences'=> $agences]);
    }
    public function list()
    {
        $agences = AgenceLocation::all();
        return view('front.agences.list-agence', compact('agences'));
    }
    
    public function viewChefs($agenceId)
    {
        // Fetch the agency details based on $agenceId
        $agency = AgenceLocation::find($agenceId);
    
        if (!$agency) {
            // Handle the case where the agency is not found
            return redirect()->back()->with('error', 'Agency not found');
        }
    
        // Fetch the chefs associated with the agency
        $chefs = ChefAgence::where('agency_id', $agenceId)->get();
    
        return view('front.agences.view-chefs', compact('agency', 'chefs'));
    }
    
    public function create()
    {
        return view('admin.agences.create');
    }

    public function store(Request $request){ 
       $validatedData = $request->validate([
    'name' => 'required',
    'email' => 'required|email|unique:agencelocation,email', 
    'address' => 'nullable',
    'phone_number' => 'nullable|digits:8', 
    'description' =>'required','min:20',
]);

    
        AgenceLocation::create($validatedData);
    
        return redirect(route('agences.index'))->with('success', 'agence ajoutée avec succès.');
    }
    
    


    public function show(AgenceLocation $agence)
    {
        return view('admin.agences.show', compact('agence'));
    }

    public function edit(AgenceLocation $agence)
    {
        return view('admin.agences.edit', compact('agence'));
    }
   
    public function update(Request $request, AgenceLocation $agence)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'nullable',
            'phone_number' => 'nullable',
            'description' => 'nullable',                  ]);

        $agence->update($validatedData);

        return redirect(route('agences.index'))->with('success', 'agence mise à jour avec succès.');
    }

    public function destroy(AgenceLocation $agence)
    {
        $agence->delete();

        return redirect(route('agences.index'))->with('success', 'agence supprimée avec succès.');
    }
}
