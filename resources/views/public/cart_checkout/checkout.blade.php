<x-header />
    <main id="main">
        <div id="content">
            <section class="py-3">
                <div class="container">
                    <div class="gioithieu page-title text-center">
                        <h1 class="title" style="text-align: center;">Thanh toán</h1>
                    </div>
                    <div class="content-checkout">
                        <form action="" method="post">
                            <div class="row col2-set" id="customer_details">
                                <div class="col col-12 col-md-6">
                                    <div class="billing-fields">
                                        <h3 class="tborder">Chi tiết thanh toán</h3>
                                        <div class="form-group w-100">
                                            <label for="exampleInputEmail1">Họ và Tên <abbr class="required"
                                                    title="bắt buộc">*</abbr></label>
                                            <input type="email" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group w-100">
                                        <label for="exampleInputEmail1">Tỉnh thành <abbr class="required"
                                                    title="bắt buộc">*</abbr></label>
                                            <select name="sel_province" class="form-control select2" data-placeholder="---Chọn tỉnh thành---" required>
                                                <option value="">---Chọn tỉnh thành---</option>
                                                @foreach($province as $value)
                                                    <option value="{{$value->matinhthanh}}">{{$value->tentinhthanh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-12 col-lg-6">
                                            <label for="exampleInputEmail1">Quận huyện <abbr class="required"
                                                    title="bắt buộc">*</abbr></label>
                                                <select class="form-control select2" name="sel_district" data-placeholder="---Chọn quận huyên---" required>
                                                    <option value="">---Chọn quận huyên---</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-lg-6">
                                            <label for="exampleInputEmail1">Phường xã <abbr class="required"
                                                    title="bắt buộc">*</abbr></label>
                                                <select class="form-control select2" name="sel_ward" data-placeholder="---Chọn phường xã---" required>
                                                    <option value="">---Chọn phường xã---</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group w-100">
                                            <label for="exampleInputEmail1">Địa chỉ <abbr class="required"
                                                    title="bắt buộc">*</abbr></label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" required>
                                            <small class="text-danger">Địa chỉ không bao gồm phường xã, quận huyện, tỉnh thành.</small>
                                        </div>
                                        <div class="form-group w-100">
                                            <label for="exampleInputEmail1">Số điện thoại <abbr class="required"
                                                    title="bắt buộc">*</abbr></label>
                                            <input type="email" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group w-100">
                                            <label for="exampleInputEmail1">Địa chỉ email <abbr class="required"
                                                    title="bắt buộc">*</abbr></label>
                                            <input type="email" class="form-control" id="exampleInputEmail1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-12 col-md-6">
                                    <div class="additional-fields">
                                        <h3 class="tborder">Thông tin bổ sung</h3>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Ghi chú</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                placeholder="Ghi chú đơn hàng, Thời gian nhận hàng ..." rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 id="order_review_heading" class="tborder">Đơn hàng của bạn</h3>

                            <div id="order_review" class="cart-table">
                                <table class="shop_table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-total">Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $carts as $row)      
                                            <tr class="cart_item">
                                                <td class="product-name" data-title="Sản phẩm">
                                                    <a href="{{url('san-pham/'.$row->model->slug)}}">{{$row->name}}</a>
                                                    <strong class="product-quantity">× {{$row->qty}}</strong>
                                                </td>

                                                <td class="product-total" data-title="Tổng cộng">
                                                    <span class="amount">{{formatPrice($row->qty * $row->price)}}</span>
                                                </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Tạm tính</th>
                                            <td><span class="amount">{{$cart_subtotal}}₫</span></td>
                                        </tr>
                                        <tr class="checkout-shipping-label">
                                            <th>Giao hàng</th>
                                            <td>Vui lòng chọn địa chỉ</td>
                                        </tr>
                                        
                                        <tr class="order-total">
                                            <th>Tổng cộng</th>
                                            <td><strong><span class="amount" data-total={{$cart_total}}>{{$cart_total}}₫</span></strong> </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div id="payment" class="checkout-payment">
                                <ul class="payment_methods methods">
                                    <li class="payment_method payment_method_cod">
                                        <input id="payment_method_cod" type="radio" class="input-radio"
                                            name="payment_method" value="cod" checked="checked" data-order_button_text=""
                                            style="display: none;">

                                        <label for="payment_method_cod">
                                            <b>COD </b></label>
                                        <div class="payment_box payment_method_cod">
                                            <p>Thanh toán khi giao hàng</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="form-group place-order p-3 text-right">
                                    <button type="submit" class="btn btn-pink text-light" id="place_order">Đặt hàng</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </section>
        </div>
    </main>
<x-footer />