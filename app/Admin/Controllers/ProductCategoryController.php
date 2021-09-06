<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::where('category_parent', 0)
                                    ->with('childrenCategories')
                                    ->get();
        $subMask = '';
        return view('admin.productCategory.nganh-nhom-hang', compact('categories', 'subMask'));
    }


    public function store(Request $request)
    {
        $slug = Str::slug($request->proCatName, '-');

        ProductCategory::create([
            'category_parent' => $request->proCatParent,
            'slug' => $slug,
            'name' => $request->proCatName,
            'code' => $request->proCatCode,
            'description' => $request->proCatDescription
        ]);

        return redirect()->route('nganh-nhom-hang.index');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function modalEdit(Request $request)
    {
        $id = $request->id;
        $proCat = ProductCategory::where('id', $id)->first();
        $allProCats = ProductCategory::all();
        $returnHTML = view('admin.productCategory.formUpdate', compact('proCat', 'id', 'allProCats'))->render();

        return response()->json([
            'html' => $returnHTML
        ], 200);
    }


    public function destroy($id)
    {
        //
    }
}
