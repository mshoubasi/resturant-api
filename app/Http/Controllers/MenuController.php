<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

class MenuController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $menu = Category::whereNull('Category_id')->with(['subcategories.discounts', 'subcategories.items', 'items'])->get();

        return CategoryResource::collection($menu);
    }
}
