<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('/resources/js/colorbox-master/example3/colorbox.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.css"
        integrity="sha512-bjwk1c6AQQOi6kaFhKNrqoCNLHpq8PT+I42jY/il3r5Ho/Wd+QUT6Pf3WGZa/BwSdRSIjVGBsPtPPo95gt/SLg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&subset=vietnamese">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/resources/css/mevivu.css')}}">
    <link rel="stylesheet" href="{{asset('/resources/css/pagination.css')}}">
    <link rel="stylesheet" href="{{asset('/resources/css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('/resources/css/chitiet-sanpham.css')}}">
    <link rel="stylesheet" href="{{asset('/resources/css/fotorama.css')}}">
    <link rel="stylesheet" href="{{asset('/resources/css/gio-hang.css')}}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>
    <div class="mobile-backdrop"> </div>

    <header class="header">
        <div class="header-wrapper">
            <div id="header-top" class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header-contact d-flex align-items-center justify-content-end">
                                <div class="mr-2 info-contact">
                                    <a href="#" class="mr-2">
                                        <span><i class="fas fa-envelope"></i> info@mevivu.com</span>
                                    </a>
                                    <a href="#" class="">
                                        <span><i class="fas fa-phone"></i> 0902315376</span>
                                    </a>
                                </div>
                                <div class="social_list">
                                    <a href="#" class="mr-2">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="mr-2">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- END TOP HEADER -->
            <div id="masthead" class="header-main">
                <div class="header-inner">
                    <nav class="navbar navbar-expanded-lg p-0 bg-white">
                        <div class="container">
                            <div class="navbar-header">
                                <a href="#" class="navbar-brand">
                                    <img src="https://mevivu.com/wp-content/uploads/2016/11/logomevivumoi.png"
                                        alt="Logo" class="app-logo">
                                </a>
                                <button type="button" class="navbar-toggler collapsed">
                                    <div class="bar1">
                                    </div>
                                    <div class="bar3">
                                    </div>
                                </button>
                            </div>
                            <div id="navbar-toggle" class="navbar-collapse collapse">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a href="{{route('home')}}">Trang chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./gioi-thieu">Giới thiệu</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="{{route('san-pham.index')}}" class="dropdown-toggle">Sản phẩm</a>
                                        <ul class="dropdown-menu">
                                            @foreach (App\Models\ProductCategory::whereCategoryParent(0)->get() as $parent)
                                                @if ($parent->childrenCategories()->count() > 0)
                                                    <li class="dropdown">
                                                        <a class="nav-item" href="{{ url('danh-muc/'.$parent->slug) }}">{{$parent->name}}</a>
                                                        <ul class="dropdown-menu">
                                                            @foreach ($parent->childrenCategories()->get() as $child1)     
                                                                @if ($child1->childrenCategories()->count() > 0)
                                                                    <li class="dropdown">
                                                                        <a class="nav-item" href="{{ url('danh-muc/'.$child1->slug) }}">{{$child1->name}}</a>
                                                                        <ul class="dropdown-menu">
                                                                            @foreach ($child1->childrenCategories()->get() as $child2)     
                                                                                <li><a class="nav-item" href="{{ url('danh-muc/'.$child2->slug) }}">{{$child2->name}}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @else
                                                                    <li><a class="nav-item" href="{{ url('danh-muc/'.$parent->slug) }}">{{$child1->name}}</a></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @else
                                                    <li><a class="nav-item" href="{{ url('danh-muc/'.$parent->slug) }}">{{$parent->name}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./blog">Tin tức - sự kiện</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./blog">Thư viện</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./lien-he">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div><!-- END HEADER MAIN -->
        </div>
    </header>
    <!-- END HEADER -->

    <div class="mobile-navbar">
        <div class="mobile-navbar-header">
            <div class="menu_title">NAO</div>
            <div class="mobile-navbar__close"><i class="fa fa-times"></i></div>
        </div>
        <ul class="mobile-navbar__nav">
            <li class="nav-item active">
                <a href="./home.html" class="nav-item">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a href="./gioi-thieu.html" class="nav-item">Giới thiệu</a>
            </li>
            <li class="nav-item has-child">
                <button class="btn btn-dropdown" type="button" data-toggle="collapse" data-target="#collapseProduct"
                    aria-expanded="false" aria-controls="collapseProduct">
                    <i class="fas fa-chevron-down"></i>
                </button>
                <a href="./san-pham.html" class="nav-item">Sản phẩm</a>
                <ul id="collapseProduct" class="collapse">
                    <li><a class="nav-item" href="#">Sebia</a></li>
                    <li class="has-child">
                        <button class="btn btn-dropdown" type="button" data-toggle="collapse"
                            data-target="#collapseVuDuc" aria-expanded="false" aria-controls="collapseVuDuc">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <a class="nav-item" href="#">Vũ Đức</a>
                        <ul class="collapse" id="collapseVuDuc">
                            <li><a class="nav-item" href="#">Mỹ phẩm</a></li>
                            <li><a class="nav-item" href="#">Đông Dược</a></li>
                        </ul>
                    </li>
                    <li class="has-child">
                        <button class="btn btn-dropdown" type="button" data-toggle="collapse"
                            data-target="#collapseCosmetic" aria-expanded="false" aria-controls="collapseCosmetic">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <a class="nav-item" href="#">Mỹ phẩm</a>
                        <ul class="collapse" id="collapseCosmetic">
                            <li><a class="nav-item" href="#">Sữa rửa mặt</a></li>
                            <li><a class="nav-item" href="#">Kem dưỡng</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-item" href="#">POSM</a>
                    </li>
                    <li>
                        <a class="nav-item" href="#">Ngành hàng gia dụng</a>
                    </li>
                    <li><a class="nav-item" href="#">Khác</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="./blog.html" class="nav-item">Tin tức - sự kiện</a>
            </li>
            <li class="nav-item">
                <a href="./blog.html" class="nav-item">Thư viện</a>
            </li>
            <li class="nav-item">
                <a href="./lien-he.html" class="nav-item">Liên hệ</a>
            </li>
        </ul>
    </div>

    <!-- END MOBILIE SIDEBAR -->