<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\ShippingBill;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ShippingController as CallShippingController;

class ShippingController extends Controller
{
    public function create(Order $order){
        
        $response = Http::accept('application/json')->post('https://donhang-uat.vnpost.vn/api/api/MobileAuthentication/GetAccessToken', [
            'TenDangNhap' => '01234567890',
            'MatKhau' => '01234567890'
        ]);
        if(!$response['IsSuccess']){
            return;
        }
        $package_content = '';
        $order_total = $order->sub_total; 
        $products = $order->products()->select('height', 'weight', 'length', 'width', 'name')->get();
        foreach($products as $key => $value){
            if($key < count($products)-1){
                $package_content .= $value->name.' x'.$value->pivot->quantity.', ';
            }else{
                $package_content .= $value->name.' x'.$value->pivot->quantity;
            }
        }
        $order_info = $order->order_info()->first();
        $order_address = $order->order_address()->first();
        $shippingController = new CallShippingController;
        $calc = $shippingController->calculateProductShippingAdmin($products);
        $response_create = Http::withHeaders([
            'Content-Type' => 'application/json',
            'h-token' => $response['Token']
        ])->post('https://donhang-uat.vnpost.vn/api/api/CustomerConnect/CreateOrder', [
            "SenderTel" => "0987818811",
            "SenderFullname" => "công ty dược vũ đức test",
            "SenderAddress" => "15 đường số 7 kdc cityland trần thị nghỉ, Số 7, Gò Vấp, Hồ Chí Minh",
            "SenderWardId" => "72710",
            "SenderDistrictId" => "7270",
            "SenderProvinceId" => "70",
            "ReceiverTel" => $order_info->phone,
            "ReceiverFullname" => $order_info->fullname,
            "ReceiverAddress" => $order_address->address,
            "ReceiverWardId" => $order_address->id_ward,
            "ReceiverDistrictId" => $order_address->id_district,
            "ReceiverProvinceId" => $order_address->id_province,
            "ReceiverAddressType" => 1,
            "ServiceName" => $order->shipping_method,
            "OrderCode" => "",
            "PackageContent" => $package_content,
            "WeightEvaluation" => $calc['weight'],
            "WidthEvaluation" => $calc['width'],
            "LengthEvaluation" => $calc['length'],
            "HeightEvaluation" => $calc['height'],
            "IsPackageViewable" => false,
            "CustomerNote" => $order_info->note,
            "PickupType" => 1,
            "CodAmountEvaluation" => $order_total,
            "IsReceiverPayFreight" => true,
            "OrderAmountEvaluation" => 0,
            "UseBaoPhat" => false,
            "UseHoaDon" => false,
            "PickupPoscode" => 0,
            "UseNhanTinSmsNguoiNhanTruocPhat" => false,
            "UseNhanTinSmsNguoiNhanSauPhat" => false
        ]);
        
        $response_create = json_decode($response_create, true);
        if(gettype($response_create) == 'string'){
            Session::flash('error', 'Tạo không thành công đơn vận chuyển.');
            // return 'hello';
            return back();
        }
        ShippingBill::create([
            'order_id' => $order->id,
            'shipping_id' => $response_create['Id'],
            'status' => $response_create['OrderStatusId'],
            'service_name_code' => $response_create['ServiceName'],
            'shipping_name' => $response_create['PackageContent'],
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 
        ]);
        $order->update([
            'status' => 1, 
            'status_shipping' => $response_create['OrderStatusId'],
        ]);
        Session::flash('success', 'Tạo thành công đơn vận chuyển.');
        return back();
    }
    public function getInfoShipping(Request $request){

        $order = Order::findOrFail($request->id_order);
        $order_address = $order->order_address()->first();

        $provinces = Province::where('matinhthanh', '<>',$order_address->id_province)
        ->select('matinhthanh', 'tentinhthanh')->get();

        $districts = District::where([['maquanhuyen', '<>',$order_address->id_district], ['matinhthanh', '=', $order_address->id_province]])
        ->select('maquanhuyen', 'tenquanhuyen')->get();
        
        $wards = Ward::where([['maphuongxa', '<>',$order_address->id_ward], ['maquanhuyen', '=', $order_address->id_district]])
        ->select('maphuongxa', 'tenphuongxa')->get();

        $html = view('admin.template-render.create-order-shipping', [
            'order'=>$order, 
            'order_info'=>$order->order_info()->first(), 
            'order_address'=>$order_address, 
            'order_products'=>$order->order_products()->get(),
            'provinces'=>$provinces,
            'districts'=>$districts,
            'wards'=>$wards])->render();
        return response()->json([
            'html' => $html
        ], 200);
    }
}
