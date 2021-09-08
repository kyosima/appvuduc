<link rel="stylesheet" href="{{asset('/resources/css/chitiet-sanpham.css')}}">

<x-header />

    <main id="main">
        <div id="content">
            <!-- Chi tiết sản phẩm -->
            <section class="py-5">
                <div class="container">
                    <div class="product product-detail">
                        <!-- Product info -->
                        <div class="row product-info">
                            <div class="col col-md-6 col-lg-6 mb-3">
                                <div class="product-gallery">
                                    <div class="fotorama" data-nav="thumbs" data-swipe="true"
                                        data-allowfullscreen="native" data-loop="true" data-transition="crossfade" width="100%" height="100%">
                                        <img src="https://rbvietnam.com/wp-content/uploads/2020/08/7796a17e8bec77b22efd.jpg">
                                        <img src="{{$product->feature_img}}">
                                        <img src="https://rbvietnam.com/wp-content/uploads/2019/06/971e4dea5b93bfcde682.jpg">
                                    </div>
                                </div>
                            </div>

                            <div class="col col-md-6 col-lg-6 mb-3">
                                <div class="product-summary">
                                    <h1 class="product_title">{{$product->name}}</h1>
                                    <p class="product-price">
                                        <span class="amount">{{moneyFormat($product->productPrice->regular_price)}}₫</span>
                                    </p>
                                    <div class="product-short-description">
                                        {!! $product->short_desc !!}
                                    </div>

                                    <form action="">
                                        <div class="form-group d-flex align-items-center">
                                            <input type="number" name="" id="" value="1" class="form-control w-25 mr-2 text-center">
                                            <button type="submit" class="btn btn-add-cart mt-0">Thêm vào giỏ</button>
                                        </div>
                                    </form>

                                    <div class="product-meta">
                                        <span class="posted_in">Danh mục:
                                            <a href="{{route('product.indexCategory', $product->productCategory->slug)}}" rel="tag">{{$product->productCategory->name}}</a>
                                        </span>
                                    </div>

                                    <div class="post-share">
                                        <ul class="social-list">
                                            <li class="social-title">
                                                <span>Chia sẻ: </span>
                                            </li>
                                            <li class="social-link">
                                                <a href="">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="social-link">
                                                <a href="">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li class="social-link">
                                                <a href="">
                                                    <i class="fab fa-pinterest-p"></i>
                                                </a>
                                            </li>
                                            <li class="social-link">
                                                <a href="">
                                                    <i class="fab fa-google-plus-g"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end product info  -->

                        <!-- Description -->
                        <div class="row">
                            <!-- Long description -->
                            <div class="col-xs-12 col-sm-7 col-md-8">
                                <div class="product-long-description">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-details-tab" data-toggle="pill"
                                                href="#pills-details" role="tab" aria-controls="pills-details"
                                                aria-selected="true">Chi tiết</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-comment-tab" data-toggle="pill"
                                                href="#pills-comment" role="tab" aria-controls="pills-comment"
                                                aria-selected="false">Bình luận</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-details" role="tabpanel"
                                            aria-labelledby="pills-details-tab">
                                            <div class="tab-inner height-limit">
                                                {!! $product->long_desc !!}
                                            </div>
                                            <div class="desc_btn-expand">
                                                <button class="desc-readmore">XEM THÊM</button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-comment" role="tabpanel"
                                            aria-labelledby="pills-comment-tab">

                                        </div>
                                    </div>
                                </div>
                            </div><!-- End long desc -->

                            <div class="col-md-4 col-xs-12 col-sm-5">
                                @include('components.sidebar', compact('productSidebar'))
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
<x-footer />