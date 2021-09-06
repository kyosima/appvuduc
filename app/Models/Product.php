<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];

    public function productPrice() {
        return $this->hasOne(ProductPrice::class);
    }

    public function productBrand() {
        return $this->hasOne(Brand::class);
    }

    public function productCalculationUnit() {
        return $this->hasOne(CalculationUnit::class);
    }

}
