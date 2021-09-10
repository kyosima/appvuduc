<x-header />
    <main id="main">
        <div id="content">
            <!-- Nổi bật -->
            <section class="pt-3">
                <div class="container">
                    <div class="page-title">
                        <h1 class="tborder">Sản phẩm</h1>
                    </div>

                    <!-- SLIDER -->
                    <div class="row">
                        <div class="col-md-3 col-xs-12 col-sm-12">
                            @include('public.products.includes.sidebar')
                        </div>
                        <div class="col-md-9 col-xs-12 col-sm-12">
                            <div class="shop-container">
                                @if(count($products) != 0)
                                    <div class="products row">
                                        @foreach ( $products as $item)
                                            @include('public.products.includes.product_grid', ['item'=>$item])
                                        @endforeach
                                    </div>
                                @else
                                    <div class="h-100 d-flex justify-content-center align-items-center "><p>Không có sản phẩm</p></div>
                                @endif

                                <!-- paginate -->
                                <div class="text-center">
                                    <div class="nav_pager">
                                        {{ $products->links('public.products.includes.pagination') }}
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