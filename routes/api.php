<?php

use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\ProduitController;
use App\Http\Controllers\Api\VenteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories', CategorieController::class);
Route::apiResource('produits', ProduitController::class);
Route::apiResource('ventes', VenteController::class);
Route::get('/produits/{code_barre}', [ProduitController::class, 'show']);
