<?php

use App\Http\Controllers\Api\DepartementController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    Route::resource('departements', DepartementController::class);
    Route::resource('users', UserController::class);
    
    // Route::prefix('users')->group(function () {
    //     Route::get('/', [UserController::class, 'index']);
    //     Route::post('/', [UserController::class, 'store']);
    //     Route::get('/{id}', [UserController::class, 'show']);
    //     Route::put('/{id}', [UserController::class, 'update']);
    //     Route::delete('/{id}', [UserController::class, 'destroy']);
    // });

    // Route::prefix('departements')->group(function () {
    //     Route::get('/', [DepartementController::class, 'index']);
    //     Route::post('/', [DepartementController::class, 'store']);
    //     Route::get('/{id}', [DepartementController::class, 'show']);
    //     Route::put('/{id}', [DepartementController::class, 'update']);
    //     Route::delete('/{id}', [DepartementController::class, 'destroy']);
    // });
});
