<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Entretien;


class EntretienController extends Controller
{
    public function index()
{
    $entretiens = Entretien::all();
    return view('entretiens.index', compact('entretiens'));
}

public function create()
{
    return view('entretiens.create');
}

    public function addTestData()
    {
        $car = Car::find(1); // Replace '1' with the actual car ID you want to associate with the Entretien
    
        $entretien = new Entretien([
            'kilometrage' => 10000,
            'date_entretien' => '2023-10-10',
            'description' => 'Regular maintenance',
        ]);
    
        $car->entretiens()->save($entretien);
    
        return 'Test data added successfully.';
    }
    public function show($id)
{
    // Find the specific Entretien record by its ID
    $entretien = Entretien::findOrFail($id);

    // Load the 'show.blade.php' view and pass the 'entretien' data
    return view('entretiens.show', compact('entretien'));
}

public function edit($id)
{
    // Find the specific Entretien record by its ID
    $entretien = Entretien::findOrFail($id);

    // Load the 'edit.blade.php' view and pass the 'entretien' data
    return view('entretiens.edit', compact('entretien'));
}

public function update(Request $request, $id)
{
    // Validate the form input data
    $validatedData = $request->validate([
        'kilometrage' => 'required|numeric',
        'date_entretien' => 'required|date',
        'description' => 'nullable|string',
    ]);

    // Find the specific Entretien record by its ID
    $entretien = Entretien::findOrFail($id);

    // Update the Entretien record with the validated data
    $entretien->update($validatedData);

    // Redirect to the 'show' page for the updated Entretien record
    return redirect()->route('entretiens.show', ['id' => $entretien->id])->with('success', 'Entretien record updated successfully');
}

public function destroy($id)
{
    // Find the specific Entretien record by its ID
    $entretien = Entretien::findOrFail($id);

    // Delete the Entretien record
    $entretien->delete();

    // Redirect to the 'index' page (or any other appropriate page)
    return redirect()->route('entretiens.index')->with('success', 'Entretien record deleted successfully');
}

}

