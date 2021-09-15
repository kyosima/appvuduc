<x-header />
    <main id="main">
        <div id="content">
            <!-- Nổi bật -->
            <section class="pt-3">
                <div class="container">
                    <div class="page-title">
                        @if ($proCat->typeof_category == 1)
                            <h1 class="tborder">
                                <a href="{{route('product.indexCategory', $proCat->parentCategories->slug)}}">
                                    {{$proCat->parentCategories->name}}
                                </a> / {{$proCat->name}}
                            </h1>
                        @elseif ($proCat->typeof_category == 2)
                            <h1 class="tborder">
                                <a href="{{route('product.indexCategory', $proCat->parentCategories->megaParentCategories->slug)}}">
                                    {{$proCat->parentCategories->megaParentCategories->name}}
                                </a> /
                                <a href="{{route('product.indexCategory', $proCat->parentCategories->slug)}}">
                                    {{$proCat->parentCategories->name}}
                                </a> / {{$proCat->name}}
                            </h1>
                        @else
                            <h1 class="tborder">{{$proCat->name}}</h1>
                        @endif
                    </div>

                    <!-- SLIDER -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="shop-container">
                                <div class="products row">
                                    @foreach ($products as $product)
                                        <div class="col col-6 col-md-4 col-lg-3">
                                            <div class="product-box box">
                                                <div class="box-image">
                                                    <div class="image-cover">
                                                        <a href="{{route('product.show', $product->slug)}}">
                                                            <img src="{{$product->feature_img}}"
                                                                alt="{{$product->sku}}" style="max-width:100%;">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="box-text">
                                                    <div class="title-wrapper">
                                                        <a href="{{route('product.show', $product->slug)}}">
                                                            <p class="product-title">{{$product->name}}</p>
                                                        </a>
                                                    </div>
                                                    <div class="price-wrapper">
                                                        <span class="price">
                                                            <span class="amount">{{moneyFormat($product->productPrice->regular_price)}}₫</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="product-add">
                                                    <a href="#" class="btn btn-add-cart">Thêm vào giỏ hàng</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- paginate -->
                                <div class="text-center">
                                    <div class="nav_pager">
                                        <ul class="pagination">
                                            <li class="active">
                                                <span aria-current="page" class="page-numbers current">1</span>
                                            </li>
                                            <li>
                                                <a class="page-numbers" href="#">2</a>
                                            </li>
                                            <li>
                                                <a class="page-numbers" href="#">3</a>
                                            </li>
                                            <li>
                                                <span class="page-numbers dots">…</span>
                                            </li>
                                            <li>
                                                <a class="page-numbers" href="#">7</a>
                                            </li>
                                            <li>
                                                <a class="next page-numbers" href="#"><i class="fa fa-angle-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
<x-footer />