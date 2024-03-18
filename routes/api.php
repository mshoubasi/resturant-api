<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;


Route::get('menu', MenuController::class);

Route::post('categories', CategoryController::class);


Route::post('category/{category}/item', ItemController::class);


Route::post('category/{category}/discount', [DiscountController::class, 'category']);
Route::post('item/{item}/discount', [DiscountController::class, 'item']);

