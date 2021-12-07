<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingBill;

class WebhookVnPostController extends Controller
{
    public function orderShippingDetect(Request $request){
        $bodyContent = $request->all();
        $response = json_decode($bodyContent['Data'], true );
        if($shipping_bill = ShippingBill::where('shipping_id', $response['Id'])->first()){
            $shipping_bill->update([ 'status' => $response['OrderStatusId'] ]);
            $shipping_bill->order()->update([
                'status' => $shipping_bill->status()->first()->status_step,
            ]);
        }
        return true;
    }
}
