<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
   
</head>
<body>
    <div class="container">
        <div class="pagecontainer">
            <nav class="navbar">              
                    <img class="logo" src="{{asset('logo.png')}}">
                    <ul>
                        <li><a href="{{route('sanpham.index')}}">Trang chủ</a></li>
                    <li><a href="{{route('home')}}">Đăng nhập Trang Quản lý</a></li>
                    <li><a href="{{route('dangnhap')}}">Đăng nhập Khách Hàng</a></li>
                    <li><a href="{{route('dangky')}}">Đăng Ký Khách Hàng</a></li>
                    </ul>
            </nav>
        </div>

        <?php include(app_path().'/Helpers/function.php'); ?>

        @if(session('success'))
         <script language="javascript">
          confirm("Đăng Ký Thành Công. Vui Lòng Đăng Nhập");
          </script>
        @endif

        <div class="container">
            <div class="pagecontainer">
                <form action="" method="post" style="border:5px solid #ccc">
                    @csrf
                    
                    <div class="imgcontainer">
                        <img src="{{asset('ava.png')}}" alt="Avatar" class="avatar">
                    </div>
                    @if(session('error'))
                    {{session('error')}}
                @endif
                    <div class="container">
                        <label for="Email"><b>Email người dùng</b></label>
                        <input type="Email" placeholder="email người dùng" name="email" required>
                        {!! showErrors($errors,'email') !!}

                        <label for="password"><b>Mật khẩu</b></label>
                        <input type="password" placeholder="Nhập mật khẩu" name="password" required>
                        {!! showErrors($errors,'password') !!}

                        <button type="submit" name="sbm">Đăng nhập</button>
                        <label>
                            <input type="checkbox" checked="checked" name="remember"> Nhớ mật khẩu
                        </label>
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                    <a href="{{route('index')}}" class="cancelbtn" type="button">Huỷ bỏ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>