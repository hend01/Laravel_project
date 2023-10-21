<?php

namespace App\Http\Controllers;
use App\Services\WeatherService;

use App\Models\car;
use App\Models\driver;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(WeatherService $weatherService)
    {
        $city = 'Tunis'; 
        $weatherData = $weatherService->getCurrentWeather($city);
    

        $cars = car::all(); 


        return view('admin.list-cars', compact('cars','weatherData'));
    }




    public function addCar(Request $request)
    {
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|between:1900,' . date('Y'),
            'color' => 'required|string|max:255',
            'license_plate' => 'required|string|unique:cars|max:10',
        ], [
            'license_plate.unique' => 'This license plate is already in use.',
            'make.required' => 'The "Make" field is required.',
            'model.required' => 'The "Model" field is required.',
            'year.required' => 'The "Year" field is required.',
            'color.required' => 'The "Color" field is required.',
        ]);
        

        $car = new Car();
        $car->make = $validatedData['make'];
        $car->driver_id = $request->driver_id;

        $car->model = $validatedData['model'];
        $car->year = $validatedData['year'];
        $car->color = $validatedData['color'];
        $car->license_plate = $validatedData['license_plate'];

        $car->save();

        return redirect('/cars')->with('success', 'La voiture a été ajoutée avec succès.');
    }
public function create()
{
    $drivers=driver::all();
    return view('admin.add-car',compact('drivers')); 
}
public function editCar($id)
{
    $car = Car::find($id);

    if (!$car) {
        return redirect('/cars')->with('error', 'Voiture introuvable.'); 
    }

    return view('admin.edit-car', compact('car'));
}
public function deleteCar($id) {
    $car = Car::find($id);
    if (!$car) {
        return redirect('/cars')->with('error', 'Car not found.'); 
    }
    
    $car->delete();
    
    return redirect('/cars')->with('success', 'The car has been deleted successfully.');
}
public function updateCar(Request $request, $id)
    {
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|between:1900,' . date('Y'),
            'color' => 'required|string|max:255',
            'license_plate' => 'required|string|max:10|unique:cars,license_plate,' . $id, 
            'license_plate.unique' => 'This license plate is already in use.',
            'make.required' => 'The "Make" field is required.',
            'model.required' => 'The "Model" field is required.',
            'year.required' => 'The "Year" field is required.',
            'color.required' => 'The "Color" field is required.',
        ]);

        $car = Car::find($id);

        if (!$car) {
            return redirect('/cars')->with('error', 'Voiture introuvable.'); 
        }

        $car->make = $validatedData['make'];
        $car->model = $validatedData['model'];
        $car->year = $validatedData['year'];
        $car->color = $validatedData['color'];
        $car->license_plate = $validatedData['license_plate'];

        $car->save();

        return redirect('/cars')->with('success', 'La voiture a été mise à jour avec succès.');
    }




}
