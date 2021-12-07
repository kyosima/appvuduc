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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('resources/css/register.css')}}">
</head>

<body>
    <main>
        <section id="register" class="d-flex justify-content-center">
            <form action="{{route('dangky')}}" method="POST" class="register-form mt-3 mb-5 w-75">
            @csrf
                <div class="container">
                    <div class="row g-3">

                        <div class="col-sm-12 text-center">
                            <h1>Đăng ký</h1>
                        </div>
                        <div class="col-sm-12">
                            <label for="" class="form-label">Họ và tên*</label>
                            <input type="text" class="form-control" name="fullname" id="" placeholder="Họ và tên">
                            <span class="text-danger">@error('fullname'){{ $message }} @enderror</span>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">CMND/CCCD*</label>
                            <input type="text" class="form-control" name="identitycard" id="" placeholder="CMND/CCCD">
                            <span class="text-danger">@error('identitycard'){{ $message }} @enderror</span>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">Đia chỉ Email*</label>
                            <input type="email" class="form-control" name="email" id="" placeholder="Email">
                            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">Số điện thoại 1*</label>
                            <input type="text" class="form-control" name="phonenumber1" id="" placeholder="Số điện thoại 1">
                            <span class="text-danger">@error('phonenumber1'){{ $message }} @enderror</span>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">Số điện thoại 2</label>
                            <input type="text" class="form-control" name="phonenumber2" id="" placeholder="Số điện thoại 2">
                            <span class="text-danger">@error('phonenumber2'){{ $message }} @enderror</span>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Tỉnh/Thành phố*</label>
                            <select class="form-select" name="tinhthanhpho" id="">
                                <option selected>Chọn Tỉnh/Thành phố</option>
                                <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Cần Thơ">Cần Thơ</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Quận/Huyện*</label>
                            <select class="form-select" name="quanhuyen" id="">
                                <option selected>Chọn Quận/Huyện</option>
                                <option value="Tân Phú">Tân Phú</option>
                                <option value="Tân Bình">Tân Bình</option>
                                <option value="Quận 1">Quận 1</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">Xã/Phường/Thị trấn*</label>
                            <select class="form-select" name="xaphuongthitran" id="">
                                <option selected>Chọn Xã/Phường/Thị trấn</option>
                                <option value="Hòa Thạnh">Hòa Thạnh</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">Địa chỉ*</label>
                            <input type="text" class="form-control" name="diachi" placeholder="Ví dụ: Số 20, ngõ 90, đường Cầu Diễn">
                            <span class="text-danger">@error('diachi'){{ $message }} @enderror</span>
                        </div>
                        <div class="col-sm-12">
                            <label for="" class="form-label">Tên đăng nhập*</label>
                            <input type="text" class="form-control" name="username" id="" placeholder="Tên đăng nhập">
                            <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                        </div>
                        <div class="col-sm-12">
                            <label for="" class="form-label">Mật khẩu*</label>
                            <input type="password" class="form-control" name="password" id="" placeholder="Mật khẩu">
                            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                        </div>
                        <div class="col-sm-12">
                            <label for="" class="form-label">Nhập lại mật khẩu*</label>
                            <input type="password" class="form-control" name="password_confirmation" id="" placeholder="Nhập lại mật khẩu">
                            <span class="text-danger"></span>
                        </div>
                        <div class="col-sm-12">
                            <label for="" class="form-label">Link giới thiệu</label>
                            <input type="text" class="form-control" name="referrallink" id="" placeholder="Link giới thiệu">
                            <span class="text-danger">@error('referral-link'){{ $message }} @enderror</span>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn mb-5" value="Đăng ký">Đăng ký</button>
                        </div>
                        <a href="{{ route('dangnhap') }}" class="text-center">Quay lại</a>
                    </div>
                </div>
            </form>
        </section>
    </main>
</body>