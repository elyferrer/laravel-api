<?php

use App\Http\Controllers\BarangayController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('regions', RegionController::class);
    Route::apiResource('provinces', ProvinceController::class);
    Route::apiResource('municipalities', MunicipalityController::class);
    Route::apiResource('barangays', BarangayController::class);
});

Route::group(['prefix' => 'user'], function() {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login'])->name('login');

    
    Route::middleware('auth:sanctum')->group(function() {
        Route::get('/', [UserController::class, 'show']);
        Route::post('/logout', [UserController::class, 'logout']);
    });
});