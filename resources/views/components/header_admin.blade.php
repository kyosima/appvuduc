<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('/resources/css/header.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('/resources/css/responsive.css')}}" type="text/css">
</head>

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
                <a href="/appvuduc/admin" class="dropbtn">
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
            @role('user')
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Quản lý sản phẩm <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/appvuduc/admin/nganh-nhom-hang">Ngành/Nhóm hàng</a>
                    <a href="/appvuduc/admin/don-vi-tinh">Đơn vị tính</a>
                    <a href="/appvuduc/admin/san-pham">Thông tin sản phẩm</a>
                </span>
            </li>
            @endrole

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

            @role('admin')
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Bán hàng <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/appvuduc/admin/don-hang-cnpp">Đơn hàng CN NPP</a>
                    <a href="/appvuduc/admin/don-hang-tra-chi-nhanh-npp">Đơn hàng trả CN NPP</a>
                    <a href="/appvuduc/admin/don-hang-dai-ly">Đơn hàng đại lý</a>
                    <a href="/appvuduc/admin/don-hang-tra-dai-ly">Đơn hàng trả đại lý</a>
                    <a href="/appvuduc/admin/don-hang-doi-thu-dai-ly">Đơn hàng đối thủ đại lý</a>
                </span>
            </li>
            @endrole

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
                    <span class="links_name">Setting</span>
                </a>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <img src="{{asset('/resources/image/header/avatar.jpg')}}" alt="profileImg">
                    <div class="name_job">
                        <div class="name">
                            Thinh Nguyen
                        </div>
                        <div class="job">Science Technology</div>
                    </div>
                </div>
                <a href="{{route('admin.dang-xuat')}}"><i class='bx bx-log-out' id="log_out"></i></a>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->