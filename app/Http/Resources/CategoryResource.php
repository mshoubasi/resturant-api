<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'discount' => DiscountResource::collection($this->whenLoaded('discounts')),
            'subcategories' => CategoryResource::collection($this->whenLoaded('subcategories')),
            'items' => ItemResource::collection($this->whenLoaded('items')),

        ];
    }
}
