<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryReqeust;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CategoryReqeust $request)
    {
        $category = Category::create($request->validated());

        return new CategoryResource($category);
    }
}
