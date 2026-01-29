<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/auth/login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('/auth/logout', [App\Http\Controllers\AuthController::class, 'logout']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/me', [App\Http\Controllers\UserController::class, 'me']);
        Route::apiResource('users', App\Http\Controllers\UserController::class);
        Route::apiResource('roles', App\Http\Controllers\RoleController::class);
        Route::apiResource('permissions', App\Http\Controllers\PermissionController::class);
        Route::apiResource('products', App\Http\Controllers\ProductController::class);
        Route::apiResource('orders', App\Http\Controllers\OrderController::class);
        Route::get('/reports/overview', [App\Http\Controllers\ReportController::class, 'overview']);
        Route::get('/audit/logs', [App\Http\Controllers\AuditController::class, 'index']);
    });
});
