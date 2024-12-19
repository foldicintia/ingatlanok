<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngatlanokController;
use App\Http\Controllers\KategoriakController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Kategóriák útvonalai
Route::prefix('kategorias')->group(function () {
    Route::get('/', [KategoriakController::class, 'index']);   
    Route::get('/{id}', [KategoriakController::class, 'show']);  
    Route::post('/', [KategoriakController::class, 'store']);    
    Route::put('/{id}', [KategoriakController::class, 'update']);
    Route::delete('/{id}', [KategoriakController::class, 'destroy']);
});

// Ingatlanok útvonalai
Route::prefix('ingatlanok')->group(function () {
    Route::get('/', [IngatlanokController::class, 'index']); 
    Route::get('/{id}', [IngatlanokController::class, 'show']); 
    Route::post('/', [IngatlanokController::class, 'store']);   
    Route::put('/{id}', [IngatlanokController::class, 'update']); 
    Route::delete('/{id}', [IngatlanokController::class, 'destroy']); 
});
