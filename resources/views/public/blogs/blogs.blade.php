<x-header />


<main id="main">
    <div id="content">
        <div class="container blog_lamdep">
            <div class="row">
                <div class="col-sm-12 page-title text-center">
                    <h1 class="title">@isset($category) {{ $category->name }}@else Tất cả bài viết @endisset</h1>
                </div>
            </div>
            <!-- blog -->
            <div class="row">
                <div class="col-md-3 col-xs-12 col-sm-12">
                    @include('public.blogs.includes.sidebar')
                </div>
                <div class="col-md-9 col-xs-12 col-sm-12">
                    <div class="shop-container">
                        @if (count($blogs) != 0)
                            <div class="products row">
                                @foreach ($blogs as $item)
                                    @include('public.blogs.includes.blog_grid', ['item'=>$item])
                                @endforeach
                            </div>
                        @else
                            <div class="h-100 d-flex justify-content-center align-items-center ">
                                <p>Không có bài viết</p>
                            </div>
                        @endif

                        <!-- paginate -->
                        <div class="text-center">
                            <div class="nav_pager">
                                {{ $blogs->links('public.blogs.includes.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>


<x-footer />
