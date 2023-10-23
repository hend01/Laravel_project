<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\AvisController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Driver\Driver;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\UserrController;
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
Route::get('/addCar', [CarController::class, 'create'])->name('cars.addCar'); 
Route::post('/addCar', [CarController::class, 'addCar'])->name('cars.addCar');
Route::delete('/cars/{id}', [CarController::class, 'deleteCar'])->name('cars.deleteCar');

Route::get('/cars/{car}', [CarController::class, 'editCar'])->name('cars.edit'); // Afficher le formulaire de mise à jour
Route::put('/cars/{car}', [CarController::class, 'updateCar'])->name('cars.update'); // Mettre à jour la voiture

Route::get('/index', function () {
    return view('front.index');
});
Route::get('/cars', [CarController::class, 'index'])->middleware('auth'); 
Route::get('/drivers', [DriverController::class, 'index'])->middleware('auth'); 
Route::get('/addDriver', [DriverController::class, 'create'])->name('drivers.addDriver'); 
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

//reclamation 
Route::get('/reclamation/create', [ReclamationController::class, 'create'])->name('reclamations.create');
Route::post('/reclamations', [ReclamationController::class, 'store'])->name('reclamations.store');
Route::get('/mes-reclamations', [ReclamationController::class, 'mesReclamations'])->name('mes-reclamations');
Route::get('/back/reclamations', [ReclamationController::class, 'index'])->name('reclamations.index');
Route::delete('/reclamations/{reclamation}', [ReclamationController::class, 'destroy'])->name('reclamations.destroy');
Route::get('/admin/reponses/create', [ReponseController::class, 'create'])->name('admin.reponse.create');
Route::post('admin/reponses', [ReponseController::class, 'store'])->name('reponses.store');
Route::get('admin/reponse/show/{reclamation_id}',[ReponseController::class, 'show'])->name('admin.reponse.show');
Route::get('admin/reponses/list', [ReponseController::class, 'index'])->name('admin.reponses.index');
Route::get('/admin/reponses/{reponse}/edit',[ReponseController::class, 'edit'])->name('admin.reponses.edit');
Route::delete('/admin/reponses/{reponse}', [ReponseController::class, 'destroy'])->name('reponses.destroy');
Route::put('/admin/reponses/{reponse}', [ReponseController::class, 'update'])->name('admin.reponses.update');
Route::get('/admin/reponses/{reponse}', [ReponseController::class, 'show'])->name('admin.reponses.show');
Route::delete('/recl/{reclamation}', [ReclamationController::class, 'destroyfront'])->name('reclamations.destroyfront');

///user back
Route::get('/back/users', [UserrController::class, 'index'])->name('users.index'); // Afficher la liste des utilisateurs
Route::get('/back/users/{user}/edit', [UserrController::class, 'edit'])->name('users.edit'); // Formulaire de modification
Route::put('/back/users/{user}', [UserrController::class, 'update'])->name('users.update'); // Mettre à jour le rôle
