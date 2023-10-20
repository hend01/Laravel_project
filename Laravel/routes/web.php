<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChefAgenceController;
use App\Http\Controllers\AgenceLocationController;

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
