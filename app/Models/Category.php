<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    public function subcategories(): HasMany
    {
        return $this->hasMany(Category::class)->with('subcategories');
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

}
