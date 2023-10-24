<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\TypedeBienController;
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


// ---------------Bien-----------------------------
Route::resource('bien', BienController::class);
// Route::get('/', [BienController::class, 'index']);
//--------------------fin Bien-------------------------------

// ---------------typedebien-----------------------------
Route::resource('typedebiens', TypedeBienController::class);
//--------------------fin typedebien -------------------------




// ---------------Contrat-----------------------------
Route::resource('contrats', ContratController::class);
//--------------------fin Contrat-------------------------------


// ---------------locataire-----------------------------
Route::resource('locataires', LocataireController::class);
//--------------------fin locataire-------------------------------

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
