<div class="col-12 product-list-item">
    <a href="{{url('san-pham/'.$item->slug)}}">
        <div class="product-list d-flex">
            <div class="product-list-img mr-1">
                <img src="{{asset($item->feature_img)}}" alt="">
            </div>
            <div class="product-list-title">
                <h5 class="product-title my-0">{{$item->name}}</h5>
                <p class="wrap-price">
                    <span class="amount">{{formatPrice($item->productPrice()->value('regular_price'))}}</span>
                </p>
            </div>
        </div>
    </a>
</div>