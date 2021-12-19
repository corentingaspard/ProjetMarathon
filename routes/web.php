<?php

use App\Http\Controllers\VueController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/','\App\Http\Controllers\IndexController');
Route::resource('profile', '\App\Http\Controllers\ControllerUsers');
//Route::get('/users/{id}', [\App\Http\Controllers\ControllerUsersx::class, 'show']);

Route::resource('series','\App\Http\Controllers\SerieController');

Route::get('/tri/{tri}',[\App\Http\Controllers\SerieController::class,'tri']);

Route::post('/series/{id}/vue',[VueController::class,'nouveau']);
//Route::get('/series/saison/{saison}',[\App\Http\Controllers\SerieController::class,'saison']);
Route::get('/series/saison/{saison}',[\App\Http\Controllers\SerieController::class,'saison']);
Route::post('/series/saison/{saison}',[\App\Http\Controllers\SerieController::class,'store']);
Route::post('/series/{id}',[\App\Http\Controllers\SerieController::class,'avis']);


Route::fallback(function() {
    return view('errors.404'); // la vue 404.blade.php
 });

