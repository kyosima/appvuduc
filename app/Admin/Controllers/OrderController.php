<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getOrderAgency(Request $request){
        $orders = Order::latest()->get();
        return view('admin.order.don-hang-dai-ly', ['orders' => $orders]);
    }

    public function getOrderDetail(Order $order){
        
        $order_address = $order->order_address()->first();

        $provinces = Province::where('matinhthanh', '<>',$order_address->id_province)
        ->select('matinhthanh', 'tentinhthanh')->get();

        $districts = District::where([['maquanhuyen', '<>',$order_address->id_district], ['matinhthanh', '=', $order_address->id_province]])
        ->select('maquanhuyen', 'tenquanhuyen')->get();
        
        $wards = Ward::where([['maphuongxa', '<>',$order_address->id_ward], ['maquanhuyen', '=', $order_address->id_district]])
        ->select('maphuongxa', 'tenphuongxa')->get();
        
        $shipping_bill = $order->order_shipping()->get();

        return view('admin.order.chi-tiet-don-hang', [
                'order'=>$order, 
                'order_info'=>$order->order_info()->first(), 
                'order_address'=>$order_address, 
                'order_products'=>$order->order_products()->get(),
                'provinces'=>$provinces,
                'districts'=>$districts,
                'wards'=>$wards,
                'shipping_bill' => $shipping_bill
            ]);
        // $html = view('admin.order.chi-tiet-don-hang', [
        //     'order'=>$order, 
        //     'order_info'=>$order->order_info()->first(), 
        //     'order_address'=>$order_address, 
        //     'order_products'=>$order->order_products()->get(),
        //     'provinces'=>$provinces,
        //     'districts'=>$districts,
        //     'wards'=>$wards])->render();
        // return response()->json([
        //     'html' => $html
        // ], 200);
    }
}
