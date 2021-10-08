<x-header />

    <main id="main">
        <div id="content">
            <!-- Chi tiết sản phẩm -->
            <section class="py-5">
                <div class="container">
                    <!-- <div class="group-title text-center pt-2 pb-4">
                        <h3 class="block-title">Sản phẩm nổi bật</h3>
                    </div> -->
                    <!-- DETAILS -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <ul id="breadcrumbs">
                                <li><a href="{{route('home')}}" class="breadcrumb-home"><i class="fa fa-home"></i></a></li>
                                @foreach ( $categoryIds as $category_id)
                                <?php $category = App\Models\ProductCategory::find($category_id); ?>
                                    <li><a href="{{url('danh-muc/'.$category->slug)}}">{{$category->name}}</a></li>
                                @endforeach
                                <li>{{$product->name}}</li>
                              </ul>
                        </div>
                    </div>
                    <div class="product product-detail">
                        <!-- Product info -->
                        <div class="row product-info">
                            <div class="col col-md-6 col-lg-6 mb-3">
                                <div class="product-gallery">
                                    <div class="fotorama" data-nav="thumbs" data-swipe="true"
                                        data-allowfullscreen="true" data-loop="true" data-fit="cover">
                                        <img src="{{$product->feature_img}}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col col-md-6 col-lg-6 mb-3">
                                <div class="product-summary">
                                    <h1 class="product_title">{{$product->name}}</h1>
                                    <p class="product-price">
                                        <span class="amount">{{formatPrice($product->productPrice()->value('regular_price'))}}</span>
                                    </p>
                                    <div class="product-short-description">
                                        {!!$product->short_desc!!}
                                    </div>

                                    <form class="form-add-to-cart" method="POST" action="{{route('cart.add')}}">
                                        <div class="form-group d-flex align-items-center">
                                            <input type="hidden" name="product_id" class="form-control" value="{{$product->id}}">
                                            <input type="number" name="qty" id="" value="1" min="1" class="form-control w-25 mr-2 text-center">
                                            <button type="submit" class="btn btn-add-cart mt-0">Thêm vào giỏ</button>
                                        </div>
                                    </form>

                                    <div class="product-meta">
                                        <span class="posted_in">Danh mục:
                                            @foreach ( $categoryIds as $category_id)
                                                <?php $category = App\Models\ProductCategory::find($category_id); ?>
                                                <a href="{{url('danh-muc/'.$category->slug)}}" rel="tag">{{$category->name}}</a>
                                            @endforeach
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
                                                {!!$product->long_desc!!}
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
                                <div id="right-sidebar">
                                    <div class="product-sidebar">
                                        <h4 class="tborder">Sản phẩm mới nhất</h4>
                                        <div class="row product_list_widget">
                                            @foreach ( $new_products as $n_products)
                                                @include('public.products.includes.product_widget_grid', ['item' => $n_products])
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
<x-footer />