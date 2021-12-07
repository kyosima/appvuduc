<div class="sidebar">
    <section class="search-wrap">
        <div class="widget-title">Tìm kiếm sản phẩm</div>
        <div class="search-container p-2">
            <form action="{{ route('tim-kiem-san-pham') }}" method="get" class="form form-search-product">
				<div class="input-group ">
					<input class="form-control py-2" type="search" value="" placeholder="Nhập tên sản phẩm..." minlength="3" name="keyword" id="example-search-input">
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
    <div class="widget-title">Danh mục sản phẩm</div>
    <nav class="acnav" role="navigation">
        <!-- start level 1 -->
        <ul class="acnav__list acnav__list--level1">

            <!-- start group 1 -->
            @foreach (App\Models\ProductCategory::whereCategoryParent(0)->get() as $parent)

                <li class="has-children">
                    <div class="acnav__label">
                        <a href="{{ url('danh-muc/'.$parent->slug) }}">{{ $parent->name }}</a> @if ($parent->childrenCategories()->count() > 0)<i class="fa fa-plus"></i>@endif
                    </div>
                    @if ($parent->childrenCategories()->count() > 0)
                        <!-- start level 2 -->
                        <ul class="acnav__list acnav__list--level2">
                            @foreach ($parent->childrenCategories()->get() as $child1)
                                <li class="has-children">
                                    <div class="acnav__label acnav__label--level2">
                                        <a href="{{url('danh-muc/'.$child1->slug) }}">{{ $child1->name }}</a> @if ($child1->childrenCategories()->count() > 0)<i class="fa fa-plus"></i>@endif
                                    </div>
                                    <!-- start level 3 -->
                                    @if ($parent->childrenCategories()->count() > 0)
                                        <ul class="acnav__list acnav__list--level3">
                                            @foreach ($child1->childrenCategories()->get() as $child2)

                                                <li>
                                                    <a class="acnav__link acnav__link--level3"
                                                        href="{{url('danh-muc/'.$child2->slug) }}">{{ $child2->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <!-- end level 3 -->
                                </li>
                            @endforeach


                        </ul>
                    @endif
                    <!-- end level 2 -->

                </li>
                <!-- end group 1 -->

            @endforeach


        </ul>
        <!-- end level 1 -->
    </nav>
    <!-- end accordion nav block -->

</section>
</div>
