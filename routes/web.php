<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntretienController;

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

//Route::get('/add-test-data', 'EntretienController@addTestData');
//Route::get('/add-test-data', 'App\Http\Controllers\EntretienController@addTestData');
Route::resource('admin/entretiens', EntretienController::class);

Route::post('admin/entretiens', [EntretienController::class, 'store'])->name('admin.entretiens.store');
Route::get('admin/entretiens', [EntretienController::class, 'index'])->name('admin.entretiens.index');


