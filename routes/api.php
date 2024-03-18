<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;


Route::get('menu', MenuController::class);

Route::post('categories', CategoryController::class);


Route::post('category/{category}/item', ItemController::class);

