<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpensesRecordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInController;
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

Route::prefix('user/')->group(function () {
    Route::prefix('{type}')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
    });
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
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
    Route::put('/{category}', [CategoryController::class, 'update']);
    Route::delete('/{category}', [CategoryController::class, 'destroy']);
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/store', [ProductController::class, 'store']);
    Route::post('/update/{product}', [ProductController::class, 'update']);
    Route::delete('/delete/{product}', [ProductController::class, 'destroy']);
});

// this are called product out as per client requirement
Route::prefix('product_out')->group(function () {
    Route::get('/', [SaleController::class, 'index']);
    Route::post('/store', [SaleController::class, 'store']);
    Route::post('/update/{sale}', [SaleController::class, 'update']);
    Route::delete('/delete/{sale}', [SaleController::class, 'destroy']);
});

Route::prefix('product_in')->group(function () {
    Route::get('/', [ProductInController::class, 'index']);
    Route::post('/store', [ProductInController::class, 'store']);
    Route::post('/{product_in}', [ProductInController::class, 'show']);
    Route::post('/update/{product_in}', [ProductInController::class, 'update']);
    Route::delete('/delete/{product_in}', [ProductInController::class, 'destroy']);
});

Route::prefix('expense_category')->group(function () {
    Route::get('/', [ExpenseCategoryController::class, 'index']);
    Route::post('/', [ExpenseCategoryController::class, 'store']);
    Route::put('/{expenseCategory}', [ExpenseCategoryController::class, 'update']);
    Route::delete('/{expenseCategory}', [ExpenseCategoryController::class, 'destroy']);
});

Route::prefix('expenses_record')->group(function () {
    Route::get('/', [ExpensesRecordController::class, 'index']);
    Route::post('/', [ExpensesRecordController::class, 'store']);
    Route::put('/{expensesRecord}', [ExpensesRecordController::class, 'update']);
    Route::delete('/{expensesRecord}', [ExpensesRecordController::class, 'destroy']);
});

Route::prefix('bank')->group(function () {
    Route::get('/', [BankController::class, 'index']);
    Route::post('/', [BankController::class, 'store']);
    Route::put('/{bank}', [BankController::class, 'update']);
    Route::delete('/{bank}', [BankController::class, 'destroy']);
});

//});
