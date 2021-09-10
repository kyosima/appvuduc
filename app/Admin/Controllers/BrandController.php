<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        $index = 0;
        return view('admin.brand.index', compact('brands', 'index'));
    }

    public function modalEdit(Request $request)
    {
        $id = $request->id;
        $unit = Brand::where('id', $id)->first();
        $returnHTML = view('admin.brand.formUpdate', compact('unit', 'id'))->render();

        return response()->json([
            'html' => $returnHTML
        ], 200);
    }


    public function store(Request $request)
    {
        $slug = Str::slug($request->name, '-');
        Brand::create([
            'code' => $request->brandCode,
            'slug' => $slug,
            'type' => $request->Type == "Company" ? "Công ty" : "Đối thủ",
            'name' => $request->brandName,
            'description' => $request->brandDescription,
        ]);

        return redirect()->route('thuong-hieu.index');
    }

    public function update(Request $request, $id)
    {
        $slug = Str::slug($request->name, '-');

        Brand::where('id', $id)->update([
            'code' => $request->brandCode,
            'slug' => $slug,
            'type' => $request->Type == "Company" ? "Công ty" : "Đối thủ",
            'name' => $request->brandName,
            'description' => $request->brandDescription
        ]);

        return redirect()->route('thuong-hieu.index');
    }

    public function updateStatus(Request $request, $id)
    {
        Brand::where('id', $id)->update([
            'status' => $request->brandStatus
        ]);

        return redirect()->route('thuong-hieu.index');
    }

    public function destroy($id)
    {
        Brand::destroy($id);
        return redirect()->route('thuong-hieu.index');
    }
}
