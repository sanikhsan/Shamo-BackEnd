<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {

    // Get data User and Update data
    Route::get('user', [UserController::class, 'index']);
    Route::post('user', [UserController::class, 'update']);

    // Get data transaction
    Route::get('transactions', [TransactionController::class, 'index']);

    // Checkout Transaction
    Route::post('checkout', [CheckoutController::class, 'checkout']);

    Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('products', [ProductController::class, 'index']);
Route::get('categories', [ProductCategoryController::class, 'index']);

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);