<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $menu = Category::with('subcategories')->get();

        return CategoryResource::collection($menu);
    }
}
