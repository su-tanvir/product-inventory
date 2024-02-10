<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TokenAuthenticationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/health-check', function (Request $request) {
    return ['data' => 'What can I serve you?'];
});

Route::post('/tokens', [TokenAuthenticationController::class, 'createToken']);
Route::middleware('auth:sanctum')->apiResource('categories', CategoryController::class);
Route::middleware('auth:sanctum')->get('categories/{category_id}/products', [CategoryController::class, 'showProducts']);
Route::middleware('auth:sanctum')->apiResource('products', ProductController::class);

