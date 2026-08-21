<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/', [\App\Http\Controllers\Auth\UserController::class, 'show']);

            Route::put('update/info', [\App\Http\Controllers\Auth\UserController::class, 'updateInfo']);
            Route::put('update/profile', [\App\Http\Controllers\Auth\UserController::class, 'updateProfile']);

            Route::delete('delete-account', [\App\Http\Controllers\Auth\UserController::class, 'destroy']);
        });
    });
});
