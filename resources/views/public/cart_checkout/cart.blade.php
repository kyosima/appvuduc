<x-header />
    <main id="main">
        <div id="content">
            <section id="main-content">
                <div class="container">
                    <div class="gioithieu page-title text-center">
                        <h1 class="title" style="text-align: center;">Giỏ hàng</h1>
                    </div>
                    @if(count($carts) !=0)

                    <div class="cart-table">

                        <table class="shop_table shop_table_responsive cart">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail text-center  d-none d-md-block">Ảnh</th>
                                    <th class="product-name">Sản phẩm</th>
                                    <th class="product-price text-center">Giá</th>
                                    <th class="product-quantity text-center">Số lượng</th>
                                    <th class="product-subtotal text-center">Tổng cộng</th>
                                    <th class="product-remove">&nbsp;</th>

                                </tr>
                            </thead>
                                <tbody>

                                @foreach ( $carts as $row)      
                                    <tr class="cart_item">
                                        <td class="product-thumbnail text-center  d-none d-md-block">
                                            <div class="box-image">
                                                <div class="image-cover">
                                                    <a href="{{url('san-pham/'.$row->slug)}}">
                                                        <img src="{{$row->model->feature_img}}" alt="Image" style="max-width:100%;">
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-name" data-title="Sản phẩm">
                                        <b><a href="{{url('san-pham/'.$row->slug)}}">{{$row->name}}</a></b>
                                        </td>
                                        <td class="product-price text-center" data-title="Giá">
                                            <span class="amount">{{formatPrice($row->price)}}</span>
                                        </td>

                                        <td class="product-quantity text-center" data-title="Số lượng">
                                            <div class="quantity">
                                                <input type="number" class="product-qty input-text qty text"
                                                    step="1" min="1" max=""
                                                    name="qty" value="{{$row->qty}}" data-rowid="{{$row->rowId}}" data-url="{{route('cart.update')}}" title="SL" size="3"
                                                    pattern="[0-9]*" inputmode="numeric">
                                            </div>
                                        </td>
                                        <td class="product-subtotal text-center" data-title="Tổng cộng">
                                            <span class="amount">{{formatPrice($row->price *$row->qty)}}</span>
                                        </td>
                                        <td class="product-remove text-center">
                                            <a class="remove" onclick="removeRowCart(this)" data-url="{{route('cart.delete')}}" data-rowid="{{$row->rowId}}" aria-label="Xóa sản phẩm" data-product_id="1559"
                                                data-product_sku="">×</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                                
                                
                            <tfoot>
                                <tr class="cart_item">
                                    <td class="product-thumbnail text-center  d-none d-md-block">
                                       
                                    </td>
                                    <td class="product-name" data-title="Sản phẩm">
                                    </td>
                                    <td class="product-price text-center" data-title="Giá">
                                    </td>

                                    <td class="product-quantity text-center" data-title="Số lượng">
                                        <b>Tạm tính: </b>
                                    </td>
                                    <td class="cart-subtotal text-center" data-title="Tổng cộng">
                                        <span class="amount">{{$cart_subtotal}}₫</span>
                                    </td>
                                    <td class="product-remove text-center">
                                       
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-thumbnail text-center  d-none d-md-block">
                                       
                                    </td>
                                    <td class="product-name" data-title="Sản phẩm">
                                    </td>
                                    <td class="product-price text-center" data-title="Giá">
                                    </td>

                                    <td class="product-quantity text-center" data-title="Số lượng">
                                          <span class="amount"><b>Tổng cộng: </b>
                                    </td>
                                    <td class="cart-total text-center" data-title="Tổng cộng">
                                        <span class="amount">{{$cart_total}}₫</span>
                                    </td>
                                    <td class="product-remove text-center">
                                       
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                           
                    </div>
                    <div class="cart-collaterals clearfix">
                        <div class="cart_totals ">
                            <div class="proceed-to-checkout py-3">
                                <a href="{{route('checkout.index')}}" class="checkout-button btn btn-readmore btn-block text-center">
                                    Thanh Toán</a>
                            </div>
                        </div>
                    </div>
                    @else

                    <p class="text-center my-4">Chưa có sản phẩm trong giỏ hàng</p>
                    @endif

                </div>
            </section>
        </div>
    </main>
<x-footer />