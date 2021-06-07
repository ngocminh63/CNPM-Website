<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

   
</head>
<body>
        <div class="wrapper">
            <nav class="navbar">
                <div class="logo">BÁN ĐỒ ĐIỆN TỬ</div>
        
                <div class="nav-items">
                    <li><a href="{{route('trangchu')}}">Trang chủ</a></li>
                    <li><a href="{{route('sanpham.index')}}">Sản phẩm</a></li>
                    <li><a href="{{route('giohang')}}">Giỏ hàng</a></li>
                    <li><a href="{{route('dangky')}}">Đăng ký</a></li>
                    <li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
                    <li><a href="{{route('login')}}">Admin</a></li>
                </div>  
        

            </nav>
            <div class="center">
                <h2>Bán sản phẩm</h2>
                <h1>Đồ điện tử</h1>
                <div class="buttons">
                    <button2 class="btn2">Dự Án</button2>
                    <button2 class="btn2">Nhóm 10</button2>
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