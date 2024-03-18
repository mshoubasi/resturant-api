<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscountRequest;
use App\Http\Resources\DiscountResource;
use App\Models\Category;
use App\Models\Item;

class DiscountController extends Controller
{
    public function category(DiscountRequest $request, Category $category)
    {
        return $this->storeDiscount($request, $category, 'category');
    }

    public function item(DiscountRequest $request, Item $item)
    {
        return $this->storeDiscount($request, $item, 'item');
    }

    private function storeDiscount(DiscountRequest $request, $model, $type)
    {
        $data = $request->validated();
        $data['type'] = $type;

        $discount = $model->discounts()->create($data);

        return new DiscountResource($discount);
    }
}

