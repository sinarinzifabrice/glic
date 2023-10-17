<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\TypedeBienController;
use App\Http\Controllers\LocataireController
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

// ---------------Bien-----------------------------
Route::resource('bien', BienController::class);
Route::get('/', [BienController::class, 'index']);
//--------------------fin Bien-------------------------------

// ---------------typedebien-----------------------------
Route::resource('typedebiens', TypedeBienController::class);
//--------------------fin typedebien--------------------------


// ---------------locataire-----------------------------
Route::resource('locataires', LocataireController::class);
//--------------------fin locataire-------------------------------


