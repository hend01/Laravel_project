<?php

use App\Http\Controllers\AvisController;
use App\Http\Controllers\EvaluationController;
use Illuminate\Support\Facades\Route;
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
Route::get('/evaluations', [EvaluationController::class, 'index']);
Route::get('/blog', [EvaluationController::class, 'blog']);
Route::post('/store-evaluation', [EvaluationController::class, 'store']);

Route::get('/avis', [AvisController::class, 'index']);
