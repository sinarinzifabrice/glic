<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;

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
Route::get('/', [BienController::class, 'index']);
//--------------------fin Bien-------------------------------