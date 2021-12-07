<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function getDetectOrder(){
        return view('theo-doi-don-hang');
    }
    public function postDetectOrder(Request $request){
        if($order = Order::find($request->in_order_id)){
            $is_shipping_order = $order->order_shipping()->get()->count();
            return view('public.template-render.has-result-detect-order', ['order' => $order, 'order_info' => $order->order_info()->first(), 'address' => $order->order_address()->first()->address_full, 'is_shipping_order' => $is_shipping_order])->render();
        }
        return view('public.template-render.no-result-detect-order')->render();
    }
}
