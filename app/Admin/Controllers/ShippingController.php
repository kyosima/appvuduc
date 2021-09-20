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

    public function create(Request $request){
        $response = Http::accept('application/json')->post('https://donhang-uat.vnpost.vn/api/api/MobileAuthentication/GetAccessToken', [
            'TenDangNhap' => '01234567890',
            'MatKhau' => '01234567890'
        ]);
        if(!$response['IsSuccess']){
            return;
        }
        $order = Order::find($request->in_id_order);
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
            "SenderAddress" => "15 đường số 7 kdc cityland trần thị nghỉ",
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

        $this->createShippingBill($order, $response_create);
        $order->update([
            'status' => 1, 
            'status_shipping' => $response_create['OrderStatusId'],
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);

        $shipping_bill = ShippingBill::where('order_id', $order->id)->get();

        $html = view('admin.template-render.create-order-shipping-success', 
                    ['shipping_bill' => $shipping_bill])->render();

        return $html;
    }

    public function getInfoShipping(Request $request){

        $order = Order::findOrFail($request->id_order);
        $order_address = $order->order_address()->first();

        $province = Province::where('matinhthanh', $order_address->id_province)->first();

        $district = $province->district()->where('maquanhuyen', $order_address->id_district)->first();

        $ward = $district->ward()->where('maphuongxa', $order_address->id_ward)->first();
        
        $address = $order_address->address.', '.$ward->tenphuongxa.', '.$district->tenquanhuyen.', '.$province->tentinhthanh;
        
        $html = view('admin.template-render.create-order-shipping', [
            'order'=>$order, 
            'order_info'=>$order->order_info()->first(), 
            'order_address'=>$order_address, 
            'order_products'=>$order->order_products()->get(),
            'address'=>$address,
            ])->render();
        return $html;
    }

    public function destroyShippingOrder(Request $request){
        $response = Http::accept('application/json')->post('https://donhang-uat.vnpost.vn/api/api/MobileAuthentication/GetAccessToken', [
            'TenDangNhap' => '01234567890',
            'MatKhau' => '01234567890'
        ]);
        if(!$response['IsSuccess']){
            return;
        }
    }

    public function createShippingBill($order, $response_create){

        $province_send = Province::where('matinhthanh', $response_create['SenderProvinceId'])->first();
        $district_send = $province_send->district()->where('maquanhuyen', $response_create['SenderDistrictId'])->first();
        $ward_send = $district_send->ward()->where('maphuongxa', $response_create['SenderWardId'])->first();

        $province_received = Province::where('matinhthanh', $response_create['ReceiverProvinceId'])->first();
        $district_received = $province_received->district()->where('maquanhuyen', $response_create['ReceiverDistrictId'])->first();
        $ward_received = $district_received->ward()->where('maphuongxa', $response_create['ReceiverWardId'])->first();

        $send_address = $response_create['SenderAddress'].', '.$ward_send->tenphuongxa.', '.$district_send->tenquanhuyen.', '.$province_send->tentinhthanh;

        $received_address = $response_create['ReceiverAddress'].', '.$ward_received->tenphuongxa.', '.$district_received->tenquanhuyen.', '.$province_received->tentinhthanh;

        return ShippingBill::create([
            'order_id' => $order->id,
            'shipping_id' => $response_create['Id'],
            'item_code' => $response_create['ItemCode'],
            'status' => $response_create['OrderStatusId'],
            'service_name_code' => $response_create['ServiceName'],
            'shipping_name' => $response_create['PackageContent'],
            'shipping_fee_total' => $response_create['TotalFreightIncludeVatEvaluation'],
            'pickup_type' => $response_create['PickupType'] == 1 ? 'Thu gom tận nơi' : 'Gửi hàng tại bưu cục',
            'package_viewable' => $response_create['IsPackageViewable'] ? 'Cho xem hàng' : 'Không cho xem hàng',
            'send_fullname' => $response_create['SenderFullname'],
            'send_address' => $send_address,
            'send_tel' => $response_create['SenderTel'],
            'receiver_fullname' => $response_create['ReceiverFullname'],
            'receiver_address' => $received_address,
            'receiver_phone' => $response_create['ReceiverTel'],
            'origin_cod_amount' => $response_create['OriginalCodAmountEvaluation'],
            'order_amount' => $response_create['OrderAmountEvaluation'],
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 
        ]);
    }
}
