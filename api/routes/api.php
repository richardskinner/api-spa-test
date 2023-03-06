<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('pokemon')->name('pokemon.')->group(function () {
    Route::get('/', [\App\Http\Controllers\PokemonController::class, 'index'])->name('all');
    Route::post('/', [\App\Http\Controllers\PokemonController::class, 'store'])->name('upload');
});
