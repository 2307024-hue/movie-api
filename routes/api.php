<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MovieController;

// Rute untuk mengambil data user yang sedang login
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rute CRUD Film kamu (Kriteria UAS No 4)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/movies', [MovieController::class, 'index']);
    Route::post('/movies', [MovieController::class, 'store']);
    Route::put('/movies/{id}', [MovieController::class, 'update']);
    Route::delete('/movies/{id}', [MovieController::class, 'destroy']);
});