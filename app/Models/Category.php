<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    public function parent():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategories(): HasMany
    {
        return $this->hasMany(Category::class)->with(['subcategories', 'discounts', 'items']);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function discounts(): MorphMany
    {
        return $this->morphMany(Discount::class, 'discountable');
    }

}
