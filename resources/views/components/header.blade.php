<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    <link rel="stylesheet" href="{{asset('/resources/css/shipping.css')}}">
    <link rel="stylesheet" href="{{asset('/resources/css/blog.css')}}">
    <link rel="stylesheet" href="{{asset('/resources/css/header.css')}}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-home" content="{{ URL::to('/') }}" />

</head>

<body>
    <header id="header" class="background-primary">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="nav-account-text" href="#">
                <ul>
                    <li><span>Xin chào,</span></li>
                    <li><b>Kira</b></li>
                </ul>
            </a>
            <div class="nav-tool">
                <ul>
                    <li>
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="far fa-bell"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="far fa-user"></i></a>
                    </li>
                </ul>
            </div>
          </nav>
          <div class="search-top">
            <div class="input-group mb-3 search-input">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i>

                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Tìm kiếm..." aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>
    </header>
    <!-- END HEADER -->

    

    <!-- END MOBILIE SIDEBAR -->