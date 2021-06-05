<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>
<body>
    <div class="wrapper2">
        <div id="nav-placeholder">
            <nav class="navbar">
                <div class="logo">BÁN ĐỒ ĐIỆN TỬ</div>
        
                <div class="nav-items">
                    <li><a href="{{route('trangchu')}}">Trang chủ</a></li>
                    <li><a href="{{route('sanpham.index')}}">Sản phẩm</a></li>
                    <li><a href="{{route('giohang')}}">Giỏ hàng</a></li>
                    <li><a href="{{route('dangky')}}">Đăng ký</a></li>
                    <li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
                </div>  

            </nav>
        </div>
    </div>
    <div class="container">
        

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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                $(".bi-search").click(function () {
                    $(".icon").toggleClass("active");
                    $("input[type='text']").toggleClass("active");
                });
            });
        </script>
</body>
</html>