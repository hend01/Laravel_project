<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;

use App\Models\driver;
use App\Models\Avis;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Driver as DriverDriver;

class DriverController extends Controller
{
    public function index(WeatherService $weatherService)
    {
        $drivers = driver::all();
        $city = 'Nabeul';
        $weatherData = $weatherService->getCurrentWeather($city);
        return view('admin.list-drivers', compact('drivers', 'weatherData'));
    }
    public function list()
    {
        $drivers = driver::all();
        return view('front.blog.list-drivers', compact('drivers'));
    }

    public function showDriverDetails($driverId)
    {
        $driver = Driver::findOrFail($driverId);
        $evaluations = Evaluation::where('driver_id', $driverId)->get();
        $averageRating = $evaluations->avg('note');

        $reviews = Avis::whereHas('evaluation', function ($query) use ($driverId) {
            $query->where('driver_id', $driverId);
        })->get();

        if (!$driver) {
            abort(404); // Handle the case when the driver is not found.
        }
        return view('front.blog.driver-details', compact('driver', 'reviews', 'averageRating'), ['driverId' => $driverId]);
    }
    public function addDriver(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:drivers|max:255',
            'phone_number' => 'nullable|string|max:20',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female,other',
        ], [
            'email.unique' => 'This email is already in use.',
            'first_name.required' => 'The "First Name" field is required.',
            'last_name.required' => 'The "Last Name" field is required.',
            'birth_date.required' => 'The "Birth Date" field is required.',
            'gender.required' => 'The "Gender" field is required.',
        ]);

        $driver = new Driver();
        $driver->first_name = $validatedData['first_name'];
        $driver->last_name = $validatedData['last_name'];
        $driver->email = $validatedData['email'];
        $driver->phone_number = $validatedData['phone_number'];
        $driver->birth_date = $validatedData['birth_date'];
        $driver->gender = $validatedData['gender'];

        $driver->save();

        return redirect('/drivers')->with('success', 'The driver has been added successfully.');
    }

    public function create()
    {
        return view('admin.add-driver');
    }
    public function deleteDriver($id)
    {
        $driver = Driver::find($id);
        if (!$driver) {
            return redirect('/drivers')->with('error', 'Driver not found.');
        }

        $driver->delete();

        return redirect('/drivers')->with('success', 'The driver has been deleted successfully.');
    }
    public function editDriver($id)
    {

        $driver = driver::find($id);

        if (!$driver) {
            return redirect('/drivers')->with('error', 'Driver introuvable.');
        }

        return view('admin.edit-driver', compact('driver'));
    }


    public function updateDriver(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:drivers,email,' . $id,
            'phone_number' => 'nullable|string|max:20',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female,other',
        ], [
            'email.unique' => 'This email is already in use.',
            'first_name.required' => 'The "First Name" field is required.',
            'last_name.required' => 'The "Last Name" field is required.',
            'birth_date.required' => 'The "Birth Date" field is required.',
            'gender.required' => 'The "Gender" field is required.',
        ]);

        $driver = Driver::find($id);

        if (!$driver) {
            return redirect('/drivers')->with('error', 'Driver not found.');
        }

        $driver->first_name = $validatedData['first_name'];
        $driver->last_name = $validatedData['last_name'];
        $driver->email = $validatedData['email'];
        $driver->phone_number = $validatedData['phone_number'];
        $driver->birth_date = $validatedData['birth_date'];
        $driver->gender = $validatedData['gender'];

        $driver->save();

        return redirect('/drivers')->with('success', 'Driver has been updated successfully.');
    }
}
