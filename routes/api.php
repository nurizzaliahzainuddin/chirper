<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChirpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/chirps', [ChirpController::class, 'index']);
    Route::post('/chirps', [ChirpController::class, 'store']);
    Route::get('/chirps/{chirp}', [ChirpController::class, 'show']);
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);
});

