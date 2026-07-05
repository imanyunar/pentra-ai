<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Scan routes
    Route::apiResource('scans', App\Http\Controllers\ScanController::class)->only(['index', 'store', 'show']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
