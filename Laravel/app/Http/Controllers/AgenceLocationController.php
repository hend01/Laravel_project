<?php

namespace App\Http\Controllers;
use App\Models\AgenceLocation;

use Illuminate\Http\Request;

class AgenceLocationController extends Controller
{
    public function index()
    {
        $agences= AgenceLocation::all();
        return view('admin.agences.index',['agences'=> $agences]);
    }

    public function create()
    {
        return view('admin.agences.create');
    }

    public function store(Request $request){ 
       $validatedData = $request->validate([
    'name' => 'required',
    'email' => 'required|email|unique:agence_location,email', // Replace your_table_name and your_column_name with actual table and column names.
    'address' => 'nullable',
    'phone_number' => 'nullable|digits:8', 
    'description' => 'nullable',
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