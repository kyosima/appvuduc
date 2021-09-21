<div class="card has-shipping-bill content-checkout mt-5 mb-5">
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
                    <th class="product-name">Tên gói hàng</th>
                    <th class="product-total">Tiền COD</th>
                    <th class="product-total">Phí giao hàng</th>
                    <th class="product-total">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $shipping_bill as $item)      
                    <tr class="cart_item">
                        <td>{{$item->item_code}}</td>
                        <td class="product-name" data-title="Sản phẩm">
                            {{$item->shipping_name}}
                        </td>
                        <td class="product-total" data-title="Tổng cộng">
                            <span class="amount">{{formatPrice($item->origin_cod_amount)}} đ</span>
                        </td>
                        <td class="product-total" data-title="Tổng cộng">
                            <span class="amount">{{formatPrice($item->shipping_fee_total)}} đ</span>
                        </td>
                        <td class="product-total" data-title="Tổng cộng">
                            Chờ lấy hàng
                        </td>
                        <td><button type="button" id="btn-destroy-shipping-order" class="btn btn-danger" data-shipping_id="{{$item->shipping_id}}">Hủy</button></td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>