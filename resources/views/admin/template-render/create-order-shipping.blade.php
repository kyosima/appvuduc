<link rel="stylesheet" href="{{asset('/resources/css/shipping.css')}}">

<div class="modal fade show" id="order-shipping-view" tabindex="-1" aria-hidden="true" style="display:block;">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-anchor"></i> Tạo đơn vận chuyển </h4>
                <button type="button" class="btn-close" onclick="destroyModal()"></button>
            </div>
            <div class="modal-body content-checkout">
               <form id="form-order-shipping-create" class="form" method="post" action="{{'shipping.create'}}">
                    <p>Thông tin người đặt</p>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                            <div class="form-group w-100">
                                <label for="fullname">Họ và Tên <abbr class="required"
                                        title="bắt buộc">*</abbr></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="{{$order_info->fullname}}" required>
                            </div>
                            <div class="form-group w-100">
                                <label for="fullname">Số điện thoại <abbr class="required"
                                        title="bắt buộc">*</abbr></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="{{$order_info->phone}}" required>
                            </div>
                            <div class="form-group w-100">
                                <label for="fullname">Email <abbr class="required"
                                        title="bắt buộc">*</abbr></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="{{$order_info->email}}" required>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                            <div class="form-group w-100">
                                <label for="">Tỉnh thành <abbr class="required"
                                            title="bắt buộc">*</abbr></label>
                                    <select name="sel_province" class="form-control" required>
                                        <option value="{{$order_address->province()->value('matinhthanh')}}">{{$order_address->province()->value('tentinhthanh')}}</option>
                                        @foreach($provinces as $value)
                                            <option value="{{$value->matinhthanh}}">{{$value->tentinhthanh}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-lg-6">
                                    <label for="">Quận huyện <abbr class="required"
                                            title="bắt buộc">*</abbr></label>
                                        <select class="form-control" name="sel_district" required>
                                            <option value="{{$order_address->district()->value('maquanhuyen')}}">{{$order_address->district()->value('tenquanhuyen')}}</option>
                                            @foreach($districts as $value)
                                                <option value="{{$value->maquanhuyen}}">{{$value->tenquanhuyen}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-6">
                                    <label for="">Phường xã <abbr class="required"
                                            title="bắt buộc">*</abbr></label>
                                        <select class="form-control" name="sel_ward" required>
                                            <option value="{{$order_address->ward()->value('maphuongxa')}}">{{$order_address->ward()->value('tenphuongxa')}}</option>
                                            @foreach($wards as $value)
                                                <option value="{{$value->maphuongxa}}">{{$value->tenphuongxa}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group w-100">
                                    <label for="address">Địa chỉ <abbr class="required"
                                            title="bắt buộc">*</abbr></label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{$order_address->address}}" required>
                                    <small class="text-danger">Địa chỉ không bao gồm phường xã, quận huyện, tỉnh thành.</small>
                                </div>
                        </div>
                    </div>     
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            <div class="form-group w-100">
                                <label for="fullname">Ghi chú <abbr class="required"
                                        title="bắt buộc">*</abbr></label>
                                <textarea name="note" id="note" style="width:100%" rows="5">{{$order_info->note}}</textarea>
                            </div>
                        </div>
                    </div>
                    <p>Thông tin sản phẩm</p>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            <div class="order-detail-table-product">
                                <table class="">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-total">Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $order_products as $item)      
                                            <tr class="cart_item">
                                                <td class="product-name" data-title="Sản phẩm">
                                                    <a href="{{url('san-pham/'.$item->product()->value('slug'))}}">{{$item->product()->value('name')}}</a>
                                                    <strong class="product-quantity">× {{$item->quantity}}</strong>
                                                </td>

                                                <td class="product-total" data-title="Tổng cộng">
                                                    <span class="amount">{{formatPrice($item->price *$item->quantity)}}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Tạm tính</th>
                                            <td><span class="amount">{{formatPrice($order->sub_total)}}</span></td>
                                        </tr>
                                        <tr class="checkout-shipping-label-curent">
                                            <th>Phí ship hiện tại</th>
                                            <td>{{formatPrice($order->shipping_total)}}</td>
                                        </tr>
                                        <tr class="checkout-shipping-label-curent">
                                            <th>Phương thức hiện tại</th>
                                            <td>@if($order->shipping_method == 'shipping-ems')Chuyển phát nhanh @else Chuyển phát thường @endif</td>
                                        </tr>
                                        <tr class="checkout-shipping-label">
                                            <th>Phí ship mới</th>
                                            <td>Chọn lại địa chỉ</td>
                                        </tr>
                                        <tr>
                                            <input type="hidden" name="shipping_method" value="{{$order->shipping_method}}">
                                        </tr>
                                        <tr class="order-total">
                                            <th>Tổng cộng</th>
                                            <td><strong><span class="amount" data-total={{$order->total}}>{{$order->total}}₫</span></strong> </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="destroyModal()">Hủy</button>
                        <button type="submit" class="btn btn-info btn-submit-unit">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('/resources/js/admin/shipping.js')}}"></script>