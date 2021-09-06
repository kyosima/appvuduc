<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CalculationUnit;
use Illuminate\Http\Request;

class CalculationUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calculationUnit = CalculationUnit::all();
        $index = 1;
        return view('admin.donViTinh.don-vi-tinh', compact('calculationUnit', 'index'));
    }

    public function modalEdit(Request $request)
    {
        $id = $request->id;
        $unit = CalculationUnit::where('id', $id)->first();
        $returnHTML = view('admin.donViTinh.formUpdate', compact('unit', 'id'))->render();

        return response()->json([
            'html' => $returnHTML
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $calculationUnit = CalculationUnit::create([
            'code' => $request->unitCode,
            'name' => $request->unitName,
            'note' => $request->unitDescription,
        ]);

        $calculationUnit = CalculationUnit::all();
        $index = 1;
        $returnHTML = view('admin.donViTinh.indexTable', compact('calculationUnit', 'index'))->render();

        return response()->json([
            'html' => $returnHTML
        ], 200);
    }


    public function update(Request $request, $id)
    {
        CalculationUnit::where('id', $id)->update([
            'code' => $request->unitCode,
            'name' => $request->unitName,
            'note' => $request->unitDescription
        ]);

        return redirect()->route('don-vi-tinh.index');

    }

    public function updateStatus(Request $request, $id)
    {
        CalculationUnit::where('id', $id)->update([
            'status' => $request->unitStatus
        ]);

        return redirect()->route('don-vi-tinh.index');
    }



    public function destroy($id)
    {
        $calculationUnit = CalculationUnit::destroy($id);
        return redirect()->route('don-vi-tinh.index');
    }
}
