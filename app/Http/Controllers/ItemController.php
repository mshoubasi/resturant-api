<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\ItemReqeust;
use App\Http\Resources\ItemResource;
use App\Models\Category;

class ItemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ItemReqeust $request, Category $category)
    {
        $item = $category->items()->create($request->validated());

        return new ItemResource($item);
    }
}
