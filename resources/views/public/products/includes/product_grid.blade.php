<div class="col col-6 col-md-4 col-lg-4">
    <div class="product-box box">
        <div class="box-image">
            <div class="image-cover">
                <a href="{{url('san-pham/'.$item->slug)}}">
                    <img src="{{asset($item->feature_img)}}"
                        alt="Image" style="max-width:100%;">
                </a>
            </div>
        </div>
        <div class="box-text">
            <div class="title-wrapper">
                <a href="{{url('san-pham/'.$item->slug)}}">
                    <p class="product-title">{{$item->name}}</p>
                </a>
            </div>
            <div class="price-wrapper">
                <span class="price">
                    <span class="amount">{{formatPrice($item->productPrice()->value('regular_price'))}}</span>
                </span>
            </div>
        </div>
        <div class="product-add">
            {{-- <a href="" class="btn btn-add-cart">Thêm vào giỏ hàng</a> --}}
            <form class="form-add-to-cart text-center" method="POST" action="{{route('cart.add')}}">
                    <input type="hidden" name="product_id" class="form-control" value="{{$item->id}}">
                    <input type="hidden" name="qty" id="" value="1" min="1" class="form-control w-25 mr-2 text-center">
                    <button type="submit" class="btn btn-add-cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </div>
</div>