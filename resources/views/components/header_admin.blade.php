<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('/resources/css/header.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('/resources/css/responsive.css')}}" type="text/css">
</head>

<body>
    <!--sidebar  -->
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name"><h3>Mevivu</h3></div>
            <i class='fa fa-bars' id="btn" ></i>
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
                    <span class="links_name w-100 align-items-center d-flex">Qu???n l?? ?????i t??c <i class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/salefie/admin/doi-nhom">?????i nh??m</a>
                    <a href="/salefie/admin/ca-nhan">C?? nh??n</a>
                    <a href="/salefie/admin/thong-tin-ban-hang">Th??ng tin b??n h??ng</a>
                </span>
            </li>
             <li class="dropdown">
                <a href="#" class="dropbtn">
                 <i class="fa fa-frown-o" aria-hidden="true"></i>
                 <span class="links_name w-100 align-items-center d-flex">Qu???n l?? s???n ph???m <i class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/salefie/admin/nganh-nhom-hang">Ng??nh/Nh??m h??ng</a>
                    <a href="/salefie/admin/don-vi-tinh">????n v??? t??nh</a>
                    <a href="/salefie/admin/san-pham">Th??ng tin s???n ph???m</a>
                </span>
            </li>
             <li class="dropdown">
                <a href="#" class="dropbtn">
                 <i class="fa fa-frown-o" aria-hidden="true"></i>
                 <span class="links_name w-100 align-items-center d-flex">C??i ?????t khuy???n m??i <i class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/salefie/admin/cau-hinh-khuyen-mai">C???u h??nh khuy???n m???i</a>
                    <a href="/salefie/admin/loai-khuyen-mai">Lo???i khuy???n m??i</a>
                </span>
            </li>
             <li class="dropdown">
                <a href="#" class="dropbtn">
                 <i class="fa fa-frown-o" aria-hidden="true"></i>
                 <span class="links_name w-100 align-items-center d-flex">B??n h??ng <i class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/salefie/admin/don-hang-cnpp">????n h??ng CN NPP</a>
                    <a href="/salefie/admin/don-hang-tra-chi-nhanh-npp">????n h??ng tr??? CN NPP</a>
                    <a href="/salefie/admin/don-hang-dai-ly">????n h??ng ?????i l??</a>
                    <a href="/salefie/admin/don-hang-tra-dai-ly">????n h??ng tr??? ?????i l??</a>
                    <a href="/salefie/admin/don-hang-doi-thu-dai-ly">????n h??ng ?????i th??? ?????i l??</a>
                </span>
            </li>
             <li class="dropdown">
                <a href="#" class="dropbtn">
                 <i class="fa fa-frown-o" aria-hidden="true"></i>
                 <span class="links_name w-100 align-items-center d-flex">B??o c??o <i class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/salefie/admin/ket-qua-dao-tao">K???t qu??? ????o t???o</a>
                </span>
            </li>
             <li class="dropdown">
                <a href="#" class="dropbtn">
                 <i class="fa fa-frown-o" aria-hidden="true"></i>
                 <span class="links_name w-100 align-items-center d-flex">T???n kho <i class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="/salefie/admin/ton-kho-CNNPP">T???n kho CN NPP</a>
                    <a href="/salefie/admin/ton-kho-dai-ly">T???n kho ?????i l??</a>
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
                    <div class="name">Tom E. Riddler</div>
                    <div class="job">Science Technology</div>
                </div>
                </div>
                <i class='bx bx-log-out' id="log_out" ></i>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->
