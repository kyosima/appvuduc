<x-header />
    <main id="main">
        <div id="content">
            <section class="py-3">
                <div class="container">
                    <div class="gioithieu page-title text-center">
                        <h1 class="title" style="text-align: center;">Đặt hàng thành công</h1>
                    </div>
                    <div class="row col2-set" id="customer_details">
                        <div class="col col-12 col-md-6">
                            <h3 class="tborder">Thông tin cơ bản</h3>
                            <p><b>Mã đơn hàng:</b> {{$order->id}}</p>
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
            </section>
        </div>
    </main>
<x-footer />