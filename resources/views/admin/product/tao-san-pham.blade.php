<x-header_admin />
<link rel="stylesheet" href="{{ asset('/resources/css/quanlysanpham.css') }}">

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
    <div class="m-3">
        <div class="wrapper bg-white p-4">
            <div class="portlet-title">
                <div class="title-name">
                    <div class="caption">
                        <i class="fa fa-product-hunt icon-drec" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase">
                            Thông tin sản phẩm</span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="portlet-body">
                <form action="{{ route('san-pham.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail size-img-profile">
                                    <img ng-src="http://api.salefie.vn/images/new_product_default.jpg" alt=""
                                        src="http://api.salefie.vn/images/new_product_default.jpg">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail size-img-profile"
                                    style="line-height: 180px;">
                                </div>
                                <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new">
                                            Chọn ảnh
                                        </span>
                                        <input type="hidden">
                                        <input type="file" ng-model="image" file-model="" name="..."
                                            class="ng-pristine ng-valid ng-empty ng-touched">
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Mã sản phẩm/Model<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input type="text" name="product_code" class="form-control">
                                                <div class="input-group-btn" id="product-status">
                                                    <label class="btn btn-status status-Active" data-value="New">
                                                        Hoạt động
                                                    </label>
                                                    <button type="button" class="btn green dropdown-toggle"
                                                        data-toggle="dropdown" tabindex="-1" aria-expanded="false">
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu status pull-right" role="menu">
                                                        <li class="status-New"><a href="javascript:;"
                                                                data-value="New" ng-click="selectStatus(100)">
                                                                Mới
                                                            </a></li>
                                                        <li class="status-Active"><a href="javascript:;"
                                                                data-value="Active" ng-click="selectStatus(200)">
                                                                Hoạt động
                                                            </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Tên sản phẩm<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="text" name="product_name" class="form-control"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Danh mục sản phẩm<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <select class="selectpicker form-control" name="category_parent"
                                                required="">
                                                <option class="bs-title-option" value="" selected="selected">
                                                </option>
                                                <option label="Ngành hàng gia dụng"
                                                    value="string:5ecccc7882badc2724b5abe8">Ngành hàng gia dụng
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Thương hiệu<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <select name="brand" class="selectpicker form-control" required="" title="Thương hiệu">
                                                <option class="bs-title-option" value="" selected="selected">
                                                </option>
                                                <option label="SUZY" value="string:5f19b295327b9246ec8e5dbf">SUZY
                                                </option>
                                                <option label="Sunlight" value="string:5f19b2a0327b9246ec8e5dc1">
                                                    Sunlight</option>
                                                <option label="KHÁC" value="string:5f5afc0fa20cae49a00405c6">KHÁC
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Mã vạch:</label>
                                        <div class="col-md-12">
                                            <input type="text" name="product_name" class="form-control"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Mã ERP:</label>
                                        <div class="col-md-12">
                                            <input type="text" name="product_name" class="form-control"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Khối lượng<span
                                            class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="text" name="product_name" class="form-control"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label class="col-md-12 control-label text-left">Chiều dài<span
                                                    class="required" aria-required="true">(*)</span>:</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="product_name" class="form-control"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label class="col-md-12 control-label text-left">Chiều cao<span
                                                    class="required" aria-required="true">(*)</span>:</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="product_name" class="form-control"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label class="col-md-12 control-label text-left">Chiều rộng<span
                                                    class="required" aria-required="true">(*)</span>:</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="product_name" class="form-control"
                                                        placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Đơn vị tính<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <select class="selectpicker form-control" name="category_parent"
                                                required="">
                                                <option class="bs-title-option" value="" selected="selected">
                                                </option>
                                                <option label="Ngành hàng gia dụng"
                                                    value="string:5ecccc7882badc2724b5abe8">Ngành hàng gia dụng
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label vertical text-left">Mô tả</label>
                                        <div class="col-md-12">
                                            <textarea name="description" class="form-control" rows="3" placeholder="..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer text-center">
        <spans style="font-size: 12px;">Copyright©2005-2021 . All rights reserved</spans>
    </div>
</section>
<x-footer_admin />
