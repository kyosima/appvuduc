<x-header_admin />
<link rel="stylesheet" href="{{ asset('/resources/css/doitac.css') }}">
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

    <!-- Modal -->
    <div class="modal fade" id="calculation_unit_create" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-anchor"></i> Thông tin chuyên mục bài viết </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formCreateUnit" action="{{ route('chuyenmuc-baiviet.store') }}"
                        role="form" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Tên đơn vị<span class="required"
                                        aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="unitName" class="form-control" required
                                        value="{{ old('unitName') }}">
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Đường dẫn (có thể để trống)</label>
                                <div class="col-md-9">
                                    <input type="text" name="unitSlug" class="form-control"
                                        value="{{ old('unitSlug') }}">
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
                        <i class="fa fa-anchor icon-drec" aria-hidden="true"></i>
                        <span class="caption-subject text-uppercase">
                            DANH SÁCH CÁC CHUYÊN MỤC BÀI VIẾT </span>
                        <span class="caption-helper"></span>
                    </div>
                    <div class="ps-5">
                        <a href="#calculation_unit_create" data-toggle="modal" class="btn btn-add"><i
                                class="fa fa-plus"></i>
                            Thêm mới </a>
                    </div>
                </div>

            </div>
            <hr>
            <div class="portlet-body">
                {{-- <div class="row">
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
                </div> --}}
                <div class="pt-3" style="overflow-x: auto;">
                    <table id="table-calculation-unit" class="table table-hover table-main">
                        <thead class="thead1" style="vertical-align: middle;">
                            <tr>
                                <th class="title-text" style="width: 100px">
                                    STT </th>
                                <th class="title-text title2">
                                    Tên chuyên mục
                                </th>
                                <th class="title-text title3">
                                    Đường dẫn</th>
                                <th class="title-text title4">
                                    Thao tác</th>
                            </tr>
                        </thead>
                        <tbody style="color: #748092; font-size: 14px; vertical-align: middle;">
                            {{-- @include('admin.donViTinh.indexTable') --}}
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

<script>
    $(document).ready(function() {
        function destroyModal() {
            $('#calculation_unit_update').remove();
        }

        $('body').click(function (e) {
            if (!$('#calculation_unit_update').hasClass('show')) {
                $('#calculation_unit_update').remove();
            }
        });
        // CREATE NEW CALCULATION UNIT
        $("#formCreateUnit").submit(function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var url = form.attr('action');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (response) {
                    $("#formCreateUnit")[0].reset();
                    $('#calculation_unit_create .form-body').prepend(`<div class="bg-success p-2 mb-2">
                        <p class="text-light m-0">Đã thêm mới đơn vị tính thành công</p>
                        </div>`);
                    setTimeout(function () {
                        $('#calculation_unit_create').modal('dispose')
                        $('#calculation_unit_create').hide()
                        $('.modal-backdrop.fade.show').remove()
                    }, 1500);
                    table.ajax.reload();
                }
            });
        });

        $(document).on("submit", '#formUpdateUnit', function (e) {
            e.preventDefault();
            var form = $(this)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: form.attr('action'),
                data: form.serialize(),
                success: function (response) {
                    $('#calculation_unit_update .form-body').prepend(`<div class="bg-success p-2 mb-2">
                        <p class="text-light m-0">Đã chỉnh sửa đơn vị tính thành công</p>
                        </div>`);
                    setTimeout(function () {
                        $('#calculation_unit_update').modal('dispose')
                        $('#calculation_unit_update').remove()
                        $('.modal-backdrop.fade.show').remove()
                        $('body').removeClass('modal-open')
                        $('body').css({'padding-right': 'unset', 'overflow': 'unset'})
                    }, 1500);
                    table.ajax.reload();
                }
            });
        });

        // DELETE
        $(document).on('click', '.item-delete', function () {
            var id = $(this).data('unitid')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if(confirm('Bạn có chắc muốn xóa')){
                $.ajax({
                    type: "DELETE",
                    url: `{{ route('chuyenmuc-baiviet.delete') }}`,
                    data: {
                        id: id
                    },
                    success: function (response) {
                        table.ajax.reload();
                    }
                });
            }
        })

        // SHOW MODAL WHEN CLICK ELEMENT TO UPDATE
        $(document).on('click', '.modal-edit-unit', function () {
            $.ajax({
                type: "GET",
                url: $(this).data('route'),
                data: {
                    id: $(this).data('unitid'),
                },
                success: function (response) {
                    $('#calculation_unit_create').after(response.html)
                    $('#calculation_unit_update').modal('show')
                }
            });
        })

        var table = $('#table-calculation-unit').DataTable({
            ordering: false,
            language: {
                    search: "Tìm kiếm:",
                    lengthMenu: "Hiển thị _MENU_ kết quả",
                    info: "Hiển thị _START_ đến _END_ trong _TOTAL_ kết quả",
                    infoEmpty: "Hiển thị 0 trên 0 trong 0 kết quả",
                    zeroRecords: "Không tìm thấy",
                    emptyTable: "Hiện tại chưa có dữ liệu",
                    paginate: {
                        first: ">>",
                        last: "<<",
                        next: ">",
                        previous: "<"
                    },
            },
            dom: '<"wrapper d-flex justify-content-between mb-3"lf>tip',
            ajax: "{{ route('chuyenmuc-baiviet.indexDatatable') }}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'name',
                },
                {
                    data: 'slug'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<button class="btn btn-warning modal-edit-unit" 
                        data-route="{{ route('chuyenmuc-baiviet.modalEdit') }}"
                        data-unitid="${row.id}"><i class="fa fa-pen-alt"></i></button>
                        <button class="btn btn-danger item-delete" data-unitid="${row.id}" onclick="confirm('Bạn có chắc muốn xóa');"><i class="fa fa-trash"></i></button>
                        `
                    }
                },
            ]
        });
    });
</script>

<x-footer_admin />