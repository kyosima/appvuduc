<div class="sidebar">
    <section class="search-wrap">
        <div class="widget-title">Tìm kiếm bài viết</div>
        <div class="search-container p-2">
            <form action="{{ route('tim-kiem-bai-viet') }}" method="get" class="form form-search-bai-viet">
				<div class="input-group ">
					<input class="form-control py-2" type="search" value="" placeholder="Nhập tên bài viết..." minlength="3" name="keyword" id="example-search-input">
					<span class="input-group-append">
					  <button class="btn btn-outline-secondary" type="submit">
						  <i class="fa fa-search"></i>
					  </button>
					</span>
			  </div>
			</form>

        </div>
</section>
<section class="nav-wrap">
    <!-- start accordion nav block -->
    <div class="widget-title">Danh mục bài viết</div>
    <nav class="acnav" role="navigation">
        <!-- start level 1 -->
        <ul class="acnav__list acnav__list--level1">

            <!-- start group 1 -->
            @foreach (App\Models\BlogCategory::all() as $category)
                <li class="has-children">
                    <div class="acnav__label">
                        <a href="{{ route('danh-muc-bai-viet.show',[$category->slug]) }}">{{ $category->name }}</a>
                    </div>
                </li>
            @endforeach


        </ul>
        <!-- end level 1 -->
    </nav>
    <!-- end accordion nav block -->

</section>
</div>
