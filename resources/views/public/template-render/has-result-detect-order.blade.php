<div class="card">
    <div class="card-header">
        <h3>Mã đơn hàng #{{$order->id}}</h3>
    </div>
    <div class="card-body">
        @if($order->status != 4)
        <div class="is-shipping-order">
            <h3 class="tborder">Thông tin vận chuyển</h3>
            <div class="middle-order">
                <ol class="progress">
                    <li class="">
                        <p>
                            Mới đặt
                        </p>
                    </li>
                    @if($order->status >= 1)
                        <li class="is-complete">
                            <p>
                                Đã xác nhận
                            </p>
                        </li>
                        @if($is_shipping_order != 0)
                            <li class="is-complete">
                                <p>
                                    Chờ lấy hàng
                                </p>
                            </li>
                        @else
                        <li class="pause-complete">
                            <p>
                                Chờ lấy hàng
                            </p>
                        </li>
                        @endif
                    @else
                        <li class="pause-complete">
                                <p>
                                    Đã xác nhận
                                </p>
                        </li>
                        <li class="pause-complete">
                            <p>
                                Chờ lấy hàng
                            </p>
                        </li>
                    @endif
                    @if($order->status >= 2)
                    <li class="is-complete 
                        ">
                        <p>
                            Đang giao hàng
                        </p>
                    </li>
                    @else
                        <li class="pause-complete">
                                <p>
                                    Đang giao hàng
                                </p>
                        </li>
                    @endif
                    @if($order->status >= 3)
                        <li class="is-complete">
                            <p>
                                Giao hàng thành công
                            </p>
                        </li>
                    @else
                        <li class="pause-complete">
                                <p>
                                    Giao hàng thành công
                                </p>
                        </li>
                    @endif
                </ol>
            </div>
        </div>
        <hr>
        @endif
        <div class="row col2-set" id="customer_details">
            <div class="col col-12 col-md-6">
                <h3 class="tborder">Thông tin cơ bản</h3>
                <p><b>Trạng thái đơn hàng:</b> {!! orderStatus($order->status) !!}</p>
                <p><b>Họ và tên:</b> {{$order_info->fullname}}</p>
                <p><b>Số điện thoại:</b> {{$order_info->phone}}</p>
                <p><b>Email:</b> {{$order_info->email}}</p>
                <p><b>Địa chỉ:</b> {{$address}} </p>
                <p><b>Ghi chú:</b> {{$order_info->note}} </p>
            </div>
            <div class="col col-12 col-md-6">
            <h3 class="tborder">Thông tin sản phẩm</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="product-name">Sản phẩm</th>
                            <th class="product-total">Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $order->products()->get() as $row)      
                            <tr class="cart_item">
                                <td class="product-name" data-title="Sản phẩm">
                                    <a href="{{url('san-pham/'.$row->slug)}}">{{$row->name}}</a>
                                    <strong class="product-quantity">× {{$row->pivot->quantity}}</strong>
                                </td>

                                <td class="product-total" data-title="Tổng cộng">
                                    <span class="amount">{{formatPrice($row->pivot->quantity * $row->pivot->price)}}</span>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="cart-subtotal">
                            <th>Tạm tính</th>
                            <td><span class="amount">{{number_format($order->sub_total)}}₫</span></td>
                        </tr>
                        <tr>
                            <th>Phí giao hàng</th>
                            <td>{{number_format($order->shipping_total)}} đ</td>
                        </tr>
                        <tr>
                            <th>Phương thức giao hàng</th>
                            <td>{{shippingMethod($order->shipping_method)}}</td>
                        </tr>
                        <tr class="order-total">
                            <th>Tổng cộng</th>
                            <td><strong><span class="amount">{{number_format($order->total+$order->shipping_total)}}₫</span></strong> </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>