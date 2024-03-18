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
        $totalDiscountAmount = $this->discounts->sum('amount');

        $discountAmount = ($this->price * $totalDiscountAmount) / 100;

        return $this->price - $discountAmount;
    }
}
