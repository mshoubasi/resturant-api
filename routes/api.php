<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\AdminLoginController;


Route::get('menu', MenuController::class);


Route::post('login', [AdminLoginController::class, 'login']);


Route::middleware(['auth:sanctum', AdminMiddleware::class])->group(function () {
    Route::post('categories', CategoryController::class);


    Route::post('category/{category}/item', ItemController::class);


    Route::post('category/{category}/discount', [DiscountController::class, 'category']);
    Route::post('item/{item}/discount', [DiscountController::class, 'item']);

    Route::post('logout', [AdminLoginController::class, 'logout']);
});
