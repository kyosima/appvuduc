<x-header />
<link rel="stylesheet" href="{{URL::to('/resources/css/order-detect.css')}}">
    <main id="main">
        <div id="content">
            <section id="main-content">
                <div class="container">
                    <div class="gioithieu page-title text-center">
                        <h1 class="title" style="text-align: center;">Theo dõi đơn hàng</h1>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xs-12 col-md-8">
                            <form id="form-detect-order" data-action="{{route('post.detect.order')}}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="in_order_id" placeholder="Nhập mã đơn hàng" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">Tra cứu</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                        <div class="col-xs-12 col-md-10 result-detect-order mt-3 mb-5">
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <script src="{{asset('/resources/js/detect-order.js')}}"></script>
<x-footer />