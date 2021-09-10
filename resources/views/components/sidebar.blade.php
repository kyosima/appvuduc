<div id="right-sidebar">
    <div class="product-sidebar">
        <h4 class="tborder">Sản phẩm mới nhất</h4>
        <div class="row product_list_widget">
            @foreach ($productSidebar as $item)
                <div class="col-12 product-list-item">
                    <a href="{{route('product.show', $item->slug)}}">
                        <div class="product-list d-flex">
                            <div class="product-list-img mr-1">
                                <img src="{{$item->feature_img}}" alt="{{$item->name}}">
                            </div>
                            <div class="product-list-title">
                                <h5 class="product-title my-0">{{$item->name}}</h5>
                                <p class="wrap-price">
                                    <span class="amount">{{moneyFormat($item->productPrice->regular_price)}}₫</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="blog-post-sidebar">
        <h4 class="tborder">CHUYÊN GIA TƯ VẤN</h4>
        <ul class="mevivu-recent-post mevivu-list-style">
            <li>
                <a href="#">Điểm mặt 5 toner làm sạch kiêm trị mụn luôn trong tình trạng hết hàng vì quá hot!</a>
            </li>
            <li>
                <a href="#">Điểm mặt 5 toner làm sạch kiêm trị mụn luôn trong tình trạng hết hàng vì quá hot!</a>
            </li>
            <li>
                <a href="#">Điểm mặt 5 toner làm sạch kiêm trị mụn luôn trong tình trạng hết hàng vì quá hot!</a>
            </li>
        </ul>
    </div>

</div>