<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\UserrController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\EntretienController;
use App\Http\Controllers\produitController;
use App\Http\Controllers\eventController;



use App\Http\Controllers\ChefAgenceController;
use App\Http\Controllers\AgenceLocationController;

use App\Http\Controllers\DriverController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ReponseAvisController;
use SebastianBergmann\CodeCoverage\Driver\Driver;
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
})->name('index');
Route::get('/cars', [CarController::class, 'index'])->middleware('auth');
Route::get('/drivers', [DriverController::class, 'index'])->middleware('auth');
Route::get('/addDriver', [DriverController::class, 'create'])->name('drivers.addDriver');
Route::post('/addDriver', [DriverController::class, 'addDriver'])->name('drivers.addDriver');
Route::delete('/drivers/{id}', [DriverController::class, 'deleteDriver'])->name('drivers.deleteDriver');
Route::get('/drivers/{driver}', [DriverController::class, 'editDriver'])->name('drivers.edit'); // Afficher le formulaire de mise à jour
Route::put('/drivers/{driver}', [DriverController::class, 'updateDriver'])->name('drivers.update'); // Mettre à jour la voiture

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/blog', [EvaluationController::class, 'blog']);

//Avis et Evaluation Routes

Route::post('/add-evaluation/{driverId}', [EvaluationController::class, 'store'])->name('evaluations.add')->middleware('auth');
Route::get('/blog/{driverId}', [AvisController::class, 'showDriverReviews'])->name('blog.driverReviews')->middleware('auth');
Route::post('/add-evaluation-and-avis/{driverId}', [AvisController::class, 'addEvaluationAndAvis'])->name('avis.addAvisAndEvaluation')->middleware('auth');
Route::get('/driver/details/{driverId}', [DriverController::class, 'showDriverDetails'])->name('driver.details');
Route::get('/driver/list', [DriverController::class, 'list'])->name('driver.list');
Route::post('/driver/details/{driverId}/reponse', [ReponseAvisController::class, 'store'])->name('reponse.create');

Route::get('/carsList', [CarController::class, 'listCars'])->name('cars.listCars');



// front reclamation
Route::delete('/recl/{reclamation}', [ReclamationController::class, 'destroyfront'])->name('reclamations.destroyfront')->middleware('auth');
Route::get('/reclamation/create', [ReclamationController::class, 'create'])->name('reclamations.create');
Route::post('/reclamations', [ReclamationController::class, 'store'])->name('reclamations.store');
Route::get('/mes-reclamations', [ReclamationController::class, 'mesReclamations'])->name('mes-reclamations');
//event produit
Route::get('/events', [eventController::class, 'index'])->name('events.index');
Route::post('/participate/{id}', [eventController::class, 'participate'])->name('events.participate');
Route::get('/event/{id}', [eventController::class, 'get']);

Route::get('/produits', [produitController::class, 'index'])->name('produits.index');
Route::get('/produit/{id}', [produitController::class, 'get']);
//event produit back
Route::get('/event/create/add', [eventController::class, 'create'])->middleware('auth')->name('event.create');
Route::post('/event', [eventController::class, 'store'])->name('event.store')->middleware('auth');
Route::delete('/ev/delete/{event}', [eventController::class,'destroy'])->middleware('auth');
Route::get('/events/{event}', [eventController::class, 'edit'])->name('produits.edit'); 
Route::get('/produits/{produit}', [produitController::class, 'edit'])->name('produits.edit'); 
Route::put('/events/{event}', [eventController::class, 'update'])->name('events.update'); 
Route::put('/produits/{produit}', [produitController::class, 'update'])->name('produits.update'); 
Route::get('/produitss', [produitController::class, 'show'])->name('produits.show'); 
Route::get('/eventss', [eventController::class, 'show'])->name('events.show'); 
//email
Route::get('/send-test-email', [produitController::class,'sendTestEmail']);


Route::delete('/produit/delete/{produit}', [produitController::class,'destroy'])->middleware('auth');
Route::get('/produit/create/add', [produitController::class, 'create'])->middleware('auth')->name('produit.create');
Route::post('/produit', [produitController::class, 'store'])->name('produit.store')->middleware('auth');


///user back
Route::get('/back/users', [UserrController::class, 'index'])->name('users.index')->middleware('auth'); // Afficher la liste des utilisateurs
Route::get('/back/users/{user}/edit', [UserrController::class, 'edit'])->name('users.edit')->middleware('auth'); // Formulaire de modification
Route::put('/back/users/{user}', [UserrController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/view-chefs/{agenceId}', [AgenceLocationController::class, 'viewChefs'])->name('view-chefs');

Route::get('/agency', [AgenceLocationController::class, 'list'])->name('agence.list');








Route::middleware(['admin'])->group(function () {



    Route::get('/back/reclamations', [ReclamationController::class, 'index'])->name('reclamations.index')->middleware('auth');
Route::delete('/reclamations/{reclamation}', [ReclamationController::class, 'destroy'])->name('reclamations.destroy');
Route::get('/admin/reponses/create', [ReponseController::class, 'create'])->name('admin.reponse.create')->middleware('auth');
Route::post('admin/reponses', [ReponseController::class, 'store'])->name('reponses.store')->middleware('auth');
Route::get('admin/reponse/show/{reclamation_id}',[ReponseController::class, 'show'])->name('admin.reponse.show')->middleware('auth');
Route::get('admin/reponses/list', [ReponseController::class, 'index'])->name('admin.reponses.index')->middleware('auth');
Route::get('/admin/reponses/{reponse}/edit',[ReponseController::class, 'edit'])->name('admin.reponses.edit')->middleware('auth');
Route::delete('/admin/reponses/{reponse}', [ReponseController::class, 'destroy'])->name('reponses.destroy')->middleware('auth');
Route::put('/admin/reponses/{reponse}', [ReponseController::class, 'update'])->name('admin.reponses.update')->middleware('auth');
Route::get('/admin/reponses/{reponse}', [ReponseController::class, 'show'])->name('admin.reponses.show')->middleware('auth');
Route::get('/reclamations/export', [ReclamationController::class, 'exportExcel'])->name('reclamations.export.excel')->middleware('auth');
Route::get('/reclamations/export-pdf', [ReclamationController::class, 'exportPDF'])->name('reclamations.export.pdf')->middleware('auth');
Route::get('admin/extraire-facture', [FactureController::class, 'extraireFacture']);


Route::resource('admin/entretiens', EntretienController::class)->middleware('auth');
Route::post('admin/entretiens', [EntretienController::class, 'store'])->name('admin.entretiens.store')->middleware('auth');
Route::get('admin/entretiens', [EntretienController::class, 'index'])->name('admin.entretiens.index')->middleware('auth');
Route::get('admin/facture/upload', [FactureController::class, 'showUploadForm'])->name('admin.facture.upload')->middleware('auth');
Route::post('admin/facture/upload', [FactureController::class, 'uploadAndExtractFacture'])->name('facture.upload')->middleware('auth');
Route::post('admin/facture/save', [FactureController::class, 'saveFacture'])->name('facture.save')->middleware('auth');
Route::get('admin/facture', [FactureController::class, 'index'])->name('facture.index')->middleware('auth');
Route::get('admin/facture/{id}/edit', [FactureController::class, 'edit'])->name('facture.edit')->middleware('auth');
Route::put('admin/factures/{id}', [FactureController::class, 'update'])->name('facture.update')->middleware('auth');
Route::delete('admin/factures/{id}', [FactureController::class, 'destroy'])->name('facture.destroy')->middleware('auth');



//

Route::get('/chefs', [ChefAgenceController::class, 'index'])->name('chefs.index');
Route::get('/chefs/create', [ChefAgenceController::class, 'create'])->name('chefs.create');
Route::post('/chefs', [ChefAgenceController::class, 'store'])->name('chefs.store');
Route::get('/chefs/{chef}/edit', [ChefAgenceController::class, 'edit'])->name('chefs.edit');
Route::put('/chefs/{chef}', [ChefAgenceController::class, 'update'])->name('chefs.update');
Route::delete('/chefs/{chef}', [ChefAgenceController::class, 'destroy'])->name('chefs.destroy');


Route::get('/agences', [AgenceLocationController::class, 'index'])->name('agences.index');
Route::get('/agences/create', [AgenceLocationController::class, 'create'])->name('agences.create');
Route::post('/agences', [AgenceLocationController::class, 'store'])->name('agences.store');
Route::get('/agences/{agence}/edit', [AgenceLocationController::class, 'edit'])->name('agences.edit');
Route::put('/agences/{agence}', [AgenceLocationController::class, 'update'])->name('agences.update');
Route::delete('/agences/{agence}', [AgenceLocationController::class, 'destroy'])->name('agences.destroy');

//Avis et Evaluation Routes
Route::get('/avis', [AvisController::class, 'index'])->name('avis');
Route::delete('/avis/{id}', [AvisController::class, 'destroy'])->name('avis.destroy')->middleware('auth');
Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations');
Route::delete('/evaluations/{id}', [EvaluationController::class, 'destroy'])->name('evaluations.destroy');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
