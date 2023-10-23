<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\AvisController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Driver\Driver;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/contact-us', function () {
    return view('front.contact-us');
});

Route::get('/contacts', function () {
    return view('admin.contact');
});
// Route::get('/addCar', 'CarController@create')->name('cars.create');
//Route::get('/addCar', [CarController::class, 'create'])->name('cars.addCar'); 
Route::post('/addCar', [CarController::class, 'addCar'])->name('cars.addCar');
Route::delete('/cars/{id}', [CarController::class, 'deleteCar'])->name('cars.deleteCar');

Route::get('/cars/{car}', [CarController::class, 'editCar'])->name('cars.edit'); // Afficher le formulaire de mise à jour
Route::put('/cars/{car}', [CarController::class, 'updateCar'])->name('cars.update'); // Mettre à jour la voiture

Route::get('/index', function () {
    return view('front.index');
});
Route::get('/cars', [CarController::class, 'index'])->middleware('auth'); 
Route::get('/drivers', [DriverController::class, 'index'])->middleware('auth'); 
//Route::get('/addDriver', [DriverController::class, 'create'])->name('drivers.addDriver'); 
Route::post('/addDriver', [DriverController::class, 'addDriver'])->name('drivers.addDriver');
Route::delete('/drivers/{id}', [DriverController::class, 'deleteDriver'])->name('drivers.deleteDriver');
Route::get('/drivers/{driver}', [DriverController::class, 'editDriver'])->name('drivers.edit'); // Afficher le formulaire de mise à jour
Route::put('/drivers/{driver}', [DriverController::class, 'updateDriver'])->name('drivers.update'); // Mettre à jour la voiture

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Avis et Evaluation Routes
Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations');
Route::delete('/evaluations/{id}', [EvaluationController::class, 'destroy'])->name('evaluations.destroy');

// Route::get('/blog', [EvaluationController::class, 'blog']);

Route::get('/avis', [AvisController::class, 'index'])->name('avis');
Route::delete('/avis/{id}', [AvisController::class, 'destroy'])->name('avis.destroy');

Route::post('/add-evaluation/{driverId}', [EvaluationController::class, 'store'])->name('evaluations.add');
Route::get('/blog/{driverId}', [AvisController::class, 'showDriverReviews'])->name('blog.driverReviews');

Route::post('/add-evaluation-and-avis/{driverId}', [AvisController::class, 'addEvaluationAndAvis'])->name('avis.addAvisAndEvaluation');


//driver
Route::get('/driver/details/{driverId}', [DriverController::class, 'showDriverDetails'])->name('driver.details');
Route::get('/driver/list', [DriverController::class, 'list'])->name('driver.list');

