<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntretienController;
use App\Http\Controllers\FactureController;

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
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin.theme');
});
Route::get('/contact-us', function () {
    return view('front.contact-us');
});

Route::get('/contacts', function () {
    return view('admin.contact');
});

Route::get('/add-car', function () {
    return view('admin.add-car');
});

Route::get('/index', function () {
    return view('front.index');
});

Route::get('admin/extraire-facture', [FactureController::class, 'extraireFacture']);

//Route::get('/add-test-data', 'EntretienController@addTestData');
//Route::get('/add-test-data', 'App\Http\Controllers\EntretienController@addTestData');
Route::resource('admin/entretiens', EntretienController::class);

Route::post('admin/entretiens', [EntretienController::class, 'store'])->name('admin.entretiens.store');

Route::get('admin/entretiens', [EntretienController::class, 'index'])->name('admin.entretiens.index');

Route::get('admin/facture/upload', [FactureController::class, 'showUploadForm'])->name('admin.facture.upload');

Route::post('admin/facture/upload', [FactureController::class, 'uploadAndExtractFacture'])->name('facture.upload');


Route::post('admin/facture/save', [FactureController::class, 'saveFacture'])->name('facture.save');


Route::get('admin/facture', [FactureController::class, 'index'])->name('facture.index');
Route::get('admin/facture/{id}/edit', [FactureController::class, 'edit'])->name('facture.edit');
Route::put('admin/factures/{id}', [FactureController::class, 'update'])->name('facture.update');
Route::delete('admin/factures/{id}', [FactureController::class, 'destroy'])->name('facture.destroy');
