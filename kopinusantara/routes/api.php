<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('/auth')->group(function() {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

Route::middleware('auth:sanctum')->group(function() {
	Route::get('users', [UserController::class, 'show']);

    Route::get('/orders', [OrderController::class, 'index']);
    // Route::post('/orders', [OrderController::class, 'store']);
    Route::post('/orders', [OrderDetailController::class, 'store']);
});

Route::middleware(['auth:sanctum', 'admin'])->group(function() {
    Route::post('/products', [ProductController::class, 'store']);
});
