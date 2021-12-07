<x-header />


    <main id="main">
        <div id="content">
            <!-- Chi tiết sản phẩm -->
            <section class="pt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <ul id="breadcrumbs">
                                <li><a href="{{route('home')}}" class="breadcrumb-home"><i class="fa fa-home"></i></a></li>
                                <li><a href="{{url('danh-muc-bai-viet/'.$category->slug)}}">{{$category->name}}</a></li>
                                <li>{{$blog->name}}</li>
                              </ul>
                        </div>
                    </div>
                    <div class="row single-post">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <article class="post-detail">
                                <header class="post-header">
                                    <h1 class="post-title entry-title">{{$blog->name}}</h1>
                                    <div class="post_meta date-time">
                                        <span class="fa fa-clock"></span> {{date('Y/m/d H:i:s', strtotime($blog->created_at))}}
                                    </div>
                                </header>

                                <div class="post-content">
                                    <div id="baiviet-container">
                                      {!!$blog->content!!}
                                    </div>
                                </div>

                            </article>
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
                            <div class="post-comment"></div>
                        </div><!-- end product info  -->

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div id="right-sidebar">
                                <div class="product-sidebar">
                                    <h4 class="tborder">Sản phẩm mới nhất</h4>
                                    <div class="row product_list_widget">
                                        @foreach( $new_products as $product)
                                            <div class="col-12 product-list-item">
                                                <a href="{{route('san-pham.show',[$product->slug])}}">
                                                    <div class="product-list d-flex">
                                                        <div class="product-list-img mr-1">
                                                            <img src="{{asset($product->feature_img)}}"
                                                                alt="">
                                                        </div>
                                                        <div class="product-list-title">
                                                            <h5 class="product-title my-0">{{$product->name}}</h5>
                                                            <p class="wrap-price">
                                                                <span class="amount">{{formatPrice($product->productPrice()->value('regular_price'))}}</span>
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
                                        @foreach ($related_blogs as $item)
                                            <li>
                                                <a href="{{route('bai-viet.show',[$item->slug])}}">{{$item->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Bài viết liên quan -->
            <div id="news_byid" class="pt-3">
                <div class="container">
                    <div class="row">
                        <div class="news_byid-iterm col-xs-12 col-sm-6 col-md-4">
                            <div class="mevivu_ls_container">
                                <div class="group-title">
                                    <h3 class="block-title">Bài Viết mới nhất</h3>
                                </div>
    
                                <div class="mevivu-ls">
                                    <ul class="mevivu-list-style">
                                        @foreach ($new_blogs as $item)
                                            <li class="list_pitem">
                                                <a href="{{route('bai-viet.show',[$item->slug])}}">{{$item->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="news_byid-iterm col-xs-12 col-sm-6 col-md-4">
                            <div class="mevivu_ls_container">
                                <div class="group-title">
                                    <h3 class="block-title">CÓ THỂ BẠN QUAN TÂM</h3>
                                </div>
    
                                <div class="mevivu-ls">
                                    <ul class="mevivu-list-style">
                                        @foreach ($mostview_blogs as $item)
                                            <li class="list_pitem">
                                                <a href="{{route('bai-viet.show',[$item->slug])}}">{{$item->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="news_byid-iterm col-xs-12 col-sm-6 col-md-4">
                            <div class="mevivu_ls_container">
                                <div class="group-title">
                                    <h3 class="block-title">XEM NHIỀU NHẤT</h3>
                                </div>
    
                                <div class="mevivu-ls">
                                    <ul class="mevivu-list-style">
                                        @foreach ($recent_blogs as $item)
                                            <li class="list_pitem">
                                                <a href="{{route('bai-viet.show',[$item->slug])}}">{{$item->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

<x-footer />