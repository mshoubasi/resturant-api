<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'price'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function discounts(): MorphMany
    {
        return $this->morphMany(Discount::class, 'discountable');
    }

    public function getDiscountedPriceAttribute()
    {
        $discount = $this->getApplicableDiscount();

        if ($discount) {
            $discountAmount = ($this->price * $discount->amount) / 100;
            return $this->price - $discountAmount;
        }

        return $this->price;
    }

    private function getApplicableDiscount()
    {
        if ($this->discounts->isNotEmpty()) {
            return $this->discounts->first();
        }


        if ($this->category && $this->category->discounts->isNotEmpty()) {
            return $this->category->discounts->first();
        }


        if ($this->category && $this->category->parent && $this->category->parent->discounts->isNotEmpty()) {
            return $this->category->parent->discounts->first();
        }

        return null;
    }
}
