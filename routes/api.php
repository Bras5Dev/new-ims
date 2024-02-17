<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('customer')->group(function () {
        Route::post('/', [UserController::class, 'index']);
        Route::post('/store', [UserController::class, 'store']);
        Route::post('/update/{id}', [UserController::class, 'update']);
        Route::post('/delete/{id}', [UserController::class, 'destroy']);
    });

    Route::prefix('brand')->group(function () {
        Route::post('/', [BrandController::class, 'index']);
        Route::post('/store', [BrandController::class, 'store']);
        Route::post('/update/{id}', [BrandController::class, 'update']);
        Route::post('/delete/{id}', [BrandController::class, 'destroy']);
    });

    Route::prefix('category')->group(function () {
        Route::post('/', [CategoryController::class, 'index']);
        Route::post('/store', [CategoryController::class, 'store']);
        Route::post('/update/{id}', [CategoryController::class, 'update']);
        Route::post('/delete/{id}', [CategoryController::class, 'destroy']);
    });

    Route::prefix('product')->group(function () {
        Route::post('/', [ProductController::class, 'index']);
        Route::post('/store', [ProductController::class, 'store']);
        Route::post('/update/{id}', [ProductController::class, 'update']);
        Route::post('/delete/{id}', [ProductController::class, 'destroy']);
    });
});
