<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShippingController extends Controller
{
    public function test(){
        // try {
        //     return District::where('maquanhuyen', 7110)->first()->ward()
        // ->select('maphuongxa', 'tenphuongxa')->get();
        // } catch (\Throwable $th) {
        //     throw $th;
        // }
        return optional(District::where('maquanhuyen', 7110)->first(), function ($user) {
            return $user->ward()->select('maphuongxa', 'tenphuongxa')->get();
        });
        
    }
    // lấy quận huyện theo tỉnh thành
    public function districtOfProvince(Request $request){
        return optional(Province::where('matinhthanh', $request->id)->first(), function ($response) {
            return $response->district()->select('maquanhuyen', 'tenquanhuyen')->get();
        });
    }
    // lấy phường xã theo quận huyện
    public function wardOfDistrict(Request $request){
        return optional(District::where('maquanhuyen', $request->id)->first(), function ($response) {
            return $response->ward()->select('maphuongxa', 'tenphuongxa')->get();
        });
    }

    public function postShippingFee(Request $request){
        
        $shipping_fee = json_decode($this->calculateCartShipping($request->district, $request->province)->getContent(), true);
        $cart_total = (int)str_replace(",", "", Cart::instance('shopping')->total());
        return view('public.template-render.calc-shipping')
            ->with('EMS', $shipping_fee['EMS'])
            ->with('BK', $shipping_fee['BK'])
            ->render(); 
    }

    // Tính phí ship tất cả sp trong giỏ hàng
    public function calculateCartShipping($district, $province){

        //kiểm tra user vnpost và lấy token user
        $user_vnpost = Http::accept('application/json')->post('https://donhang.vnpost.vn/api/api/MobileAuthentication/GetAccessToken', [
            'TenDangNhap' => env('SHIPPING_USERNAME'),
            'MatKhau' => env('SHIPPING_PASSWORD')
        ]);
        $user_vnpost = json_decode($user_vnpost, true);
        if(!$user_vnpost['IsSuccess']){
            return;
        }

        //tổng tiền trong giỏ hàng chưa thuế
        $cart_subtotal = (int)str_replace(",", "", Cart::instance('shopping')->subtotal());

        //tính toán cân nặng, chiều dài, chiều rộng, chiều cao của tất cả sp trong giỏ hàng.
        $calc = $this->calculateProductShipping(Cart::instance('shopping')->content());

        //Tính phí vận chuyển bên vnpost
        $response_shippinh_fee = Http::withHeaders([
            'Content-Type' => 'application/json',
            'h-token' => $user_vnpost['Token']
        ])->post('https://donhang.vnpost.vn/api/api/CustomerConnect/TinhCuocTatCaDichVu', [
            "SenderDistrictId" => "7270",
            "SenderProvinceId" => "70",
            "ReceiverDistrictId" => $district,
            "ReceiverProvinceId" => $province,
            "Weight" => $calc['weight'],
            "Width" => $calc['width'],
            "Length" => $calc['length'],
            "Height" => $calc['height'],
            "CodAmount" => $cart_subtotal,
            "IsReceiverPayFreight" => true,
            "OrderAmount" => 0,
            "UseBaoPhat" => false,
            "UseHoaDon" => false,
            "UseNhanTinSmsNguoiNhanTruocPhat" => false,
            "UseNhanTinSmsNguoiNhanSauPhat" => false
        ]);
        //kết quả trả về: object -> array.
        $response_shippinh_fee = json_decode($response_shippinh_fee, true);

        //lấy 2 phương thức vận chuyển: chuyển phát nhanh, chuyển phát thường.
        // unset($response_shippinh_fee[2], $response_shippinh_fee[3], $response_shippinh_fee[4], $response_shippinh_fee[5]);

        //EMS: chuyển phát nhanh, BK: chuyển phát thường
        return response(array('EMS' => $response_shippinh_fee[0]["TongCuocBaoGomDVCT"], 'BK' => $response_shippinh_fee[1]["TongCuocBaoGomDVCT"]));
    }

    //Tính toán cân nặng, chiều dài, chiều rộng, chiều cao của tất cả sp trong giỏ hàng.
    public function calculateProductShipping($products){
        $weight = 0;
        $height = 0;
        $width = 0;
        $length = 0;
        foreach($products as $value){
            $weight += $value->model->weight*$value->qty;
            $height = $height < $value->model->height ? $value->model->height : $height;
            $width += $value->model->width*$value->qty;
            $length = $length < $value->model->length ? $value->model->length : $length;
        }
        return array("weight" => $weight, "height" => $height, "width" => $width, "length" => $length);
    }
}
