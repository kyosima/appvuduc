<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
    integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"
        integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/resources/css/header.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('/resources/css/responsive.css') }}" type="text/css">
    <meta name="url-home" content="{{ URL::to('/') }}" />

</head>
<x-alert />
<body>
    <!--sidebar  -->
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">
                <h3>Mevivu</h3>
            </div>
            <i class='fa fa-bars' id="btn"></i>
        </div>

        <ul class="nav-list p-0">
            <li class="dropdown">
                <a href="./admin" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Quản lý đối tác <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/appvuduc/admin/doi-nhom">Đội nhóm</a>
                    <a href="/appvuduc/admin/ca-nhan">Cá nhân</a>
                    <a href="/appvuduc/admin/thong-tin-ban-hang">Thông tin bán hàng</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Quản lý sản phẩm <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/appvuduc/admin/nganh-nhom-hang">Ngành/Nhóm hàng</a>
                    <a href="/appvuduc/admin/thuong-hieu">Thương hiệu</a>
                    <a href="/appvuduc/admin/don-vi-tinh">Đơn vị tính</a>
                    <a href="/appvuduc/admin/san-pham">Thông tin sản phẩm</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Quản lý khóa học <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/appvuduc/admin/khoa-hoc">Thông tin khóa học</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Cài đặt khuyến mãi <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/appvuduc/admin/cau-hinh-khuyen-mai">Cấu hình khuyến mại</a>
                    <a href="/appvuduc/admin/loai-khuyen-mai">Loại khuyến mãi</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Bán hàng <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="{{route('orderadmin.CNNPP')}}">Đơn hàng CN NPP</a>
                    <a href="{{route('orderadmin.backCNNPP')}}">Đơn hàng trả CN NPP</a>
                    <a href="{{route('orderadmin.agency')}}">Đơn hàng đại lý</a>
                    <a href="{{route('orderadmin.backAgency')}}">Đơn hàng trả đại lý</a>
                    <a href="{{route('orderadmin.doithuAgency')}}">Đơn hàng đối thủ đại lý</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Báo cáo <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/appvuduc/admin/ket-qua-dao-tao">Kết quả đào tạo</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Tồn kho <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/appvuduc/admin/ton-kho-CNNPP">Tồn kho CN NPP</a>
                    <a href="/appvuduc/admin/ton-kho-dai-ly">Tồn kho đại lý</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Bài viết <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/appvuduc/admin/chuyen-muc-bai-viet">Chuyên mục bài viết</a>
                    <a href="/appvuduc/admin/tat-ca-bai-viet">Tất cả bài viết</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name">Setting</span>
                    <span class="links_name w-100 align-items-center d-flex">Setting <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="{{URL::to('admin/cau-hinh-van-chuyen')}}">Cấu hình vận chuyển</a>
                </span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <img src="{{ asset('/resources/image/header/avatar.jpg') }}" alt="profileImg">
                    <div class="name_job">
                        <div class="name">Tom E. Riddler</div>
                        <div class="job">Science Technology</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->
