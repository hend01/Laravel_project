<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ReponseController;

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
})->name('index');

Route::get('/reclamation/create', [ReclamationController::class, 'create'])->name('reclamations.create');
Route::post('/reclamations', [ReclamationController::class, 'store'])->name('reclamations.store');
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


