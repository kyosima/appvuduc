<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class PublicProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);
        return view('publicProduct.san-pham', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::whereSlug($slug)->firstOrFail();
        $productSidebar = Product::latest()->limit(4)->get();
        return view('publicProduct.chitiet-sanpham', compact('product', 'productSidebar'));
    }

    public function indexCategory($slug)
    {
        $proCat = ProductCategory::whereSlug($slug)->firstOrFail();
        $query = Product::where('category_id', $proCat->id);
        foreach ($proCat->childrenCategories as $item) {
            if(count($item->categories) > 0) {
                foreach ($item->categories as $cate) {
                    $query->orWhere('category_id', $cate->id);
                }
            }
            $query->orWhere('category_id', $item->id);
        }
        $products = $query->get();
        return view('publicProduct.danhmuc-sanpham', compact('products', 'proCat'));
    }
}
