<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhâp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('/resources/css/header.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- css đối tác -->
    <link rel="stylesheet" href="{{asset('/resources/css/log.css')}}">
</head>
<style>
    
</style>
<body>
    <div class="login-container">
        <div class="pt-5 text-center">
            <div class="logo fs-1 text-white mt-4">
                <img src="{{asset('/resources/image/header/logomevivumoi.png')}}" class="img-fluid" width="300" height="60" alt="">
            </div>
            <div class="form-login m-auto mt-4 shadow-sm">
                <form action="{{route('admin.dang-nhap')}}" class="px-4 pt-4" method="POST">
                    @csrf
                    <h3 class="text-center header-title mt-3 mb-4">Đăng nhập</h3>
                    <div class="input-group mb-3">
                        <span class="input-group-text w-input-group" id="basic-addon1"><i class="fa fa-calculator"></i></span>
                        <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text w-input-group" id="basic-addon1"><i class="fa fa-unlock-alt"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <div class="btn-login">
                        <button type="submit" class="btn-login-btn btn text-start btn-primary py-2 px-4">
                            Đăng nhập
                        </button>
                    </div>
                </form>
                </div>
            <div class="mt-3">
               <span class="text-white copyright_login">Designed by © Mevivu</span>
            </div>
        </div>
    </div>
</body>
</html>