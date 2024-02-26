<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
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

Route::post('/login', [AuthenticationController::class, 'login']);

//Route::middleware('auth:sanctum')->group(function () {

Route::prefix('customer')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/store', [UserController::class, 'store']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::delete('/delete/{id}', [UserController::class, 'destroy']);
});

Route::prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::post('/', [BrandController::class, 'store']);
    Route::put('/{brand}', [BrandController::class, 'update']);
    Route::delete('/{brand}', [BrandController::class, 'destroy']);
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/store', [ProductController::class, 'store']);
    Route::post('/update/{product}', [ProductController::class, 'update']);
    Route::delete('/delete/{product}', [ProductController::class, 'destroy']);
});

// this are called product out as per client requirement
Route::prefix('sale')->group(function () {
    Route::get('/', [SaleController::class, 'index']);
    Route::post('/store', [SaleController::class, 'store']);
    Route::post('/update/{sale}', [SaleController::class, 'update']);
    Route::delete('/delete/{sale}', [SaleController::class, 'destroy']);
});

Route::prefix('expense-category')->group(function () {
    Route::get('/', [ExpenseCategoryController::class, 'index']);
    Route::post('/store', [ExpenseCategoryController::class, 'store']);
    Route::post('/update/{expenseCategory}', [ExpenseCategoryController::class, 'update']);
    Route::delete('/delete/{expenseCategory}', [ExpenseCategoryController::class, 'destroy']);
});

//});
