<x-header_admin />
<link rel="stylesheet" href="{{ asset('/resources/css/quanlysanpham.css') }}">
<link rel="stylesheet" href="{{ asset('/resources/css/doitac.css') }}">


<section class="home-section">

    <!-- menu mobile -->
    <div class="header bg-white shadow-sm header_mobile">
        <div class="text">Dashboard</div>
        <div class="icon_menu-mobile">
            <i class="fa fa-bars" data-bs-toggle="collapse" href="#menu-main" role="button" aria-expanded="false"
                aria-controls="menu-main"></i>
        </div>
    </div>
    <ul class="sub-menu collapse sidebar-mobile list-group list-group-flush" id="menu-main">
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Dashboard</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-doitac" role="button"
                aria-expanded="false" aria-controls="menu-mobile-doitac"><i class="fa fa-bar-chart-o"></i> Quản lý đối
                tác <i class="fa fa-angle-down fs-4 float-end"></i></span>
            <ul class="p-0 menu-child collapse" id="menu-mobile-doitac">
                <li class="list-group-item p-0 list-group-item-action">
                    <a href="doinhom.html" class="list-group-item-link list-item-custom px-5"><i
                            class="fa fa-bar-chart-o"></i> Đội nhóm</a>
                </li>
                <li class="list-group-item p-0 list-group-item-action">
                    <a href="canhan.html" class="list-group-item-link list-item-custom px-5"><i
                            class="fa fa-bar-chart-o"></i> Cá nhân</a>
                </li>
                <li class="list-group-item p-0 list-group-item-action">
                    <a href="thontinbanhang.html" class="list-group-item-link list-item-custom px-5"><i
                            class="fa fa-bar-chart-o"></i> Thông tin bán hàng</a>
                </li>
            </ul>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Quản lý nhân viên</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Quản lý sản phẩm</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Bán hàng</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Tồn kho</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Dữ liệu Master</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Setting</a>
        </li>
    </ul>
    </div>
    <!-- end menu mobile -->

    <!-- Modal -->
    <div class="modal fade" id="product_category_create" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-map-signs"></i> Thông tin ngành hàng </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formCreateProductCategory" action="{{ route('nganh-nhom-hang.store') }}"
                        role="form" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Danh mục cha<span class="required"
                                        aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <select name="proCatParent" id="proCatParent" class="form-control">
                                        <option value="0" selected>---</option>
                                        @foreach ($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @if (count($item->childrenCategories) > 0)
                                                @foreach ($item->childrenCategories as $childCategory)
                                                    @include('admin.productCategory.option_child_category', ['child_category' =>
                                                    $childCategory, 'subMask' => $subMask . '--'])
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Mã ngành hàng<span class="required"
                                        aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="proCatCode" class="form-control" required
                                        value="{{ old('proCatCode') }}">
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Tên ngành hàng<span class="required"
                                        aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="proCatName" class="form-control" required
                                        value="{{ old('proCatName') }}">
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Miêu tả</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="proCatDescription" rows="3"
                                        value="{{ old('proCatDescription') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-info btn-submit-unit">Lưu</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- END MODAL -->

    <div class="m-3">
        <div class="wrapper bg-white p-4">
            <div class="portlet-title d-flex justify-content-between align-items-center">
                <div class="title-name d-flex align-items-center">
                    <div class="caption">
                        <i class="fa fa-product-hunt icon-drec" aria-hidden="true"></i>
                        <span class="caption-subject text-uppercase">
                            SẢN PHẨM </span>
                        <span class="caption-helper"></span>
                    </div>
                    <div class="ps-5">
                        <a href="#product_category_create" data-toggle="modal" class="btn btn-add"><i
                                class="fa fa-plus"></i>
                            Thêm mới </a>
                    </div>
                </div>

            </div>
            <hr>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="col-md-12 flex-row gap-2">
                            <select class="form-select fs-14" aria-label="Default select example">
                                <option selected>10</option>
                                <option value="1">25</option>
                                <option value="2">50</option>
                                <option value="3">100</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="col-md-12">
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="Tìm kiếm"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"
                                        aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-3" style="overflow-x: auto;">
                    <table class="table table-hover table-main">
                        <thead class="thead1" style="vertical-align: middle;">
                            <tr>
                                <th class="title title-text">
                                    STT </th>
                                <th class="title title-text">
                                    Mã ngành hàng</th>
                                <th class="title title-text">
                                    Tên ngành hàng
                                </th>
                                <th class="title title-text">
                                    Tổng danh mục </th>
                                <th class="title title-text">
                                    Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody style="color: #748092; font-size: 14px; vertical-align: middle;">
                            @foreach ($categories as $category)
                                @if (count($category->categories) > 0)
                                    <tr class="parent-category has-child" data-categoryid="{{$category->id}}">
                                        <td><i class="fa fa-plus click-cell" aria-hidden="true"></td>
                                        <td>{{ $category->code }}</td>
                                        <td><a style="text-decoration: none; cursor: pointer;" class="modal-edit-proCat" data-route="{{route('nganh-nhom-hang.modalEdit')}}" data-unitid="{{$category->id}}">{{ $category->name }}</a></td>
                                        <td><button class="btn btn-circle">{{count($category->categories)}}</button></td>
                                        <td>
                                            <div class="input-group" style="min-width: 108px;">
                                                <span style=" max-width: 82px;min-width: 82px;" type="text"
                                                    class="form-control form-control-sm font-size-s text-white active text-center"
                                                    aria-label="Text input with dropdown button">Hoạt động</span>
                                                <button class="btn bg-status-drop border-0 text-white py-0 px-2"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-angle-down" aria-hidden="true"></i></button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="#">Ngừng</a></li>
                                                    <li><a class="dropdown-item" href="#">Xoá</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @foreach ($category->childrenCategories as $childCategory)
                                        @include('admin.productCategory.child_category', ['child_category' =>
                                        $childCategory])
                                    @endforeach
                                @else
                                    <tr>
                                        <td></td>
                                        <td>{{ $category->code }}</td>
                                        <td><a style="text-decoration: none; cursor: pointer;" class="modal-edit-proCat" data-route="{{route('nganh-nhom-hang.modalEdit')}}" data-unitid="{{$category->id}}">{{ $category->name }}</a></td>
                                        <td><button class="btn btn-circle">0</button></td>
                                        <td>
                                            <div class="input-group" style="min-width: 108px;">
                                                <span style=" max-width: 82px;min-width: 82px;" type="text"
                                                    class="form-control form-control-sm font-size-s text-white active text-center"
                                                    aria-label="Text input with dropdown button">Hoạt động</span>
                                                <button class="btn bg-status-drop border-0 text-white py-0 px-2"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-angle-down" aria-hidden="true"></i></button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="#">Ngừng</a></li>
                                                    <li><a class="dropdown-item" href="#">Xoá</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="footer text-center">
        <spans style="font-size: 12px; color: #333;">Copyright©2005-2021 . All rights reserved</spans>
    </div>
</section>

<script type="text/javascript" src="{{ asset('/resources/js/adminProductCategory.js') }}"></script>

<x-footer_admin />
