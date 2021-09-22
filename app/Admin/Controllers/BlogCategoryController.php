<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        return view('admin.blogCategory.index');
    }

    public function indexDatatable()
    {
        $units = BlogCategory::all();
        if($units) {
            return response()->json([
                'message' => "Success!",
                'code' => 200,
                'data' => $units
            ]);
        } else {
            return response()->json([
                'message' => "Error!",
                'code' => 500,
            ]);
        }
    }

    public function modalEdit(Request $request)
    {
        $id = $request->id;
        $unit = BlogCategory::where('id', $id)->first();
        $returnHTML = view('admin.blogCategory.formUpdate', compact('unit', 'id'))->render();

        return response()->json([
            'html' => $returnHTML
        ], 200);
    }

    public function store(Request $request)
    {
        if($request->unitSlug == null) {
            $slug = Str::slug($request->unitName, '-');
            $blogCategory = BlogCategory::create([
                'name' => $request->unitName,
                'slug' => $slug,
            ]);
        }
        else {
            $blogCategory = BlogCategory::create([
                'name' => $request->unitName,
                'slug' => $request->unitSlug,
            ]);
        }

        if($blogCategory){
            return response()->json([
                'message' => "Success",
                'code' => 200,
            ]);
        } else {
            return response()->json([
                'message' => "Error",
                'code' => 500,
            ]);
        }

    }


    public function update(Request $request)
    {
        if($request->unitSlug == null) {
            $slug = Str::slug($request->unitName, '-');
            $blogCategory = BlogCategory::where('id', $request->id)->update([
                'name' => $request->unitName,
                'slug' => $slug
            ]);
        }
        else {
            $blogCategory = BlogCategory::where('id', $request->id)->update([
                'name' => $request->unitName,
                'slug' => $request->unitSlug
            ]);
        }

        if($blogCategory){
            return response()->json([
                'message' => "Success",
                'code' => 200,
            ]);
        } else {
            return response()->json([
                'message' => "Error",
                'code' => 500,
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $blogCategory = BlogCategory::destroy($request->id);
        if($blogCategory){
            return response()->json([
                'message' => "Success",
                'code' => 200,
            ]);
        } else {
            return response()->json([
                'message' => "Error",
                'code' => 500,
            ]);
        }
    }
}