<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'product_category';

    public function categories()
    {
        return $this->hasMany(ProductCategory::class, 'category_parent');
    }

    public function parentCategories()
    {
        return $this->belongsTo(ProductCategory::class, 'category_parent');
    }

    public function childrenCategories()
    {
        return $this->hasMany(ProductCategory::class, 'category_parent')->with('categories');
    }
}
