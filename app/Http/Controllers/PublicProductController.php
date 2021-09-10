<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class PublicProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::latest()->paginate(9);
        return view('public.products.shop', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $product = Product::whereSlug($slug)->firstorfail();
        $categoryIds = ProductCategory::where('id', $parentId = ProductCategory::where('id', $product->category_id)
        ->pluck('category_parent')->toArray())
        ->pluck('category_parent')
        ->merge($parentId)
        ->merge($product->category_id)
        ->toArray();
        $categoryIds = array_diff( $categoryIds, [0] );
        $new_products = Product::latest()->paginate(3);
        return view('public.products.product_detail', ['product' => $product, 'categoryIds' => $categoryIds, 'new_products'=>$new_products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchProduct(Request $request){
        $keyword = $_GET['keyword'];
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->latest()->paginate(9);
        return view('public.products.shop', ['products' => $products]);
    }
}
