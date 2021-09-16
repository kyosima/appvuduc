<x-header_admin />
<link rel="stylesheet" href="{{asset('/resources/css/khuyenmai.css')}}">
<link rel="stylesheet" href="{{asset('/resources/css/shipping.css')}}">
<section class="home-section">
    <div class="header bg-white shadow-sm header_mobile">
        <div class="text"><i class="fas fa-anchor"></i> Chi tiết đơn hàng</div>
        <div class="icon_menu-mobile">
            <i class="fa fa-bars" data-bs-toggle="collapse" href="#menu-main" role="button" aria-expanded="false" aria-controls="menu-main"></i>
        </div>
    </div>
    <ul class="sub-menu collapse sidebar-mobile list-group list-group-flush" id="menu-main">
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Dashboard</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-doitac" role="button" aria-expanded="false" aria-controls="menu-mobile-doitac"><i class="fa fa-bar-chart-o"></i> Quản lý đối tác <i class="fa fa-angle-down fs-4 float-end"></i></span>
            <ul class="p-0 menu-child collapse" id="menu-mobile-doitac">
                <li class="list-group-item p-0 list-group-item-action">
                    <a href="doinhom.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đội nhóm</a>
                </li>
                <li class="list-group-item p-0 list-group-item-action">
                    <a href="canhan.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Cá nhân</a>
                </li>
                <li class="list-group-item p-0 list-group-item-action">
                    <a href="thontinbanhang.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Thông tin bán hàng</a>
                </li>
            </ul>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Quản lý nhân viên</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Quản lý sản phẩm</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Bán hàng</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Tồn kho</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Dữ liệu Master</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Setting</a>
        </li>
    </ul>
    <x-alert />
    <div class="m-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="card content-checkout">
                    <div class="card-body">	
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3>Đơn hàng #{{$order->id}}
                                @if($order->status == 0)
                                    (<span class="text-warning">Chưa xử lý</span>)
                                @elseif($order->status == 1)
                                    (<span class="text-info">Đang xử lý</span>)
                                @elseif($order->status == 2)
                                    (<span class="text-success">Đã hoàn thành</span>)
                                @else
                                    (<span class="text-info">Đã hủy</span>)
                                @endif
                                </h3>
                            </div>
                            <div>
                                 @if(count($shipping_bill) == 0)
                                 <a  href={{route('post.shipping.create', ['order' => $order->id])}} class="btn btn-success">
                                        <i class="fas fa-shipping-fast"></i>Tạo đơn vận Chuyển</a>
                                @else
                                <button class="btn btn-success">
                                        <i class="fas fa-shipping-fast"></i> Đã tạo đơn vận chuyển</button>
                                @endif
                                
                                <!-- <button id="btn-order-shipping-create" type="button" class="btn btn-success" data-id="{{$order->id}}" data-url={{route('get.shipping.create')}} onClick="viewShippingOrder(this)">
                                    <i class="fas fa-shipping-fast"></i> Tạo đơn vận Chuyển
                                </button>&nbsp; -->
                                <span data-bs-toggle="collapse" class="btn btn-primary" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            </div>
                        </div>
                        <div class="collapse show" id="collapseExample">
                            <div class="row">
                                <div class="col-sm-12" style="overflow-x: auto;">
                                <form id="form-order-detail" class="form" method="post" action="{{'order.update'}}">
                                    <input type="hidden" name="in_id_order" value="{{$order->id}}">
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
                                                    <select name="sel_province" class="form-control select2" data-placeholder="---Chọn tỉnh thành---" required>
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
                                                        <select class="form-control select2" name="sel_district" data-placeholder="---Chọn quận huyên---" required>
                                                            <option value="{{$order_address->district()->value('maquanhuyen')}}">{{$order_address->district()->value('tenquanhuyen')}}</option>
                                                            @foreach($districts as $value)
                                                                <option value="{{$value->maquanhuyen}}">{{$value->tenquanhuyen}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-lg-6">
                                                    <label for="">Phường xã <abbr class="required"
                                                            title="bắt buộc">*</abbr></label>
                                                        <select class="form-control select2" name="sel_ward" data-placeholder="---Chọn phường xã---" required>
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
                                                <table class="table">
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
                                                            <td>@if($order->shipping_method == 'EMS')Chuyển phát nhanh @else Chuyển phát thường @endif</td>
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
                                                            <td><strong><span class="amount" data-total={{number_format($order->total)}}>{{number_format($order->total + $order->shipping_total)}}₫</span></strong> </td>
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
                </div>

                @if(count($shipping_bill) > 0)
                <div class="card content-checkout mt-5 mb-5">
                    <div class="card-body">	
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3>Đơn vận chuyển</h3>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-name">Tên gói hàng</th>
                                    <th class="product-total">Giá trị</th>
                                    <th class="product-total">Phí giao hàng</th>
                                    <th class="product-total">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $shipping_bill as $item)      
                                    <tr class="cart_item">
                                        <td class="product-name" data-title="Sản phẩm">
                                            {{$item->shipping_name}}
                                        </td>
                                        <td class="product-total" data-title="Tổng cộng">
                                            <span class="amount">{{formatPrice($item->order()->first()->total)}}</span>
                                        </td>
                                        <td class="product-total" data-title="Tổng cộng">
                                            <span class="amount">{{formatPrice($item->order()->first()->shipping_total)}}</span>
                                        </td>
                                        <td class="product-total" data-title="Tổng cộng">
                                            Chờ lấy hàng
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
                @endif


            </div>
            
        </div>
    </div>

</section>
<script src="{{asset('/resources/js/shipping/shipping.js')}}"></script>
<script src="{{asset('/resources/js/admin/shipping.js')}}"></script>
<x-footer_admin />


