<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <div class="container">
        <div id="nav-placeholder">

        </div>
    </div>
    <?php include(app_path().'/Helpers/function.php'); ?>

    <div class="pagecontainer">
        <form action="{{ route('xldangky') }}" style="border:5px solid #ccc" , method="POST">
            @csrf
            <div class="container">
                <h1>Đăng ký tài khoản</h1>
                <p>Hãy hoàn tất thông tin trong ô trống để đăng ký tài khoản.</p>
                <hr>

                <label for="name"><b>Họ tên</b></label>
                <input type="name" placeholder="Điền Họ Tên của bạn" name="fullname" required>
                {!! showErrors($errors,'fullname') !!}

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Điền Email" name="email" required>
                {!! showErrors($errors,'email') !!}

                <label for="password"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Điền mật khẩu" name="password" required>
                {!! showErrors($errors,'password') !!}

                <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
                <input type="password" placeholder="Nhập lại mật khẩu" name="psw_repeat" required>
                {!! showErrors($errors,'psw_repeat') !!}

                <div class="genderbox">
                    <label><b>Giới tính</b></label><br />
                    <select name="gender"  for="gender">
                        <option value=2>Nam</option>
                        <option value=1>Nữ</option>
                    </select>
                </div>

                <label for="birthday"><b>Số Điện Thoại</b></label>
                <input type="number" id="birthday" name="phone" required>
                {!! showErrors($errors,'phone') !!}

                <label for="adress"><b>Địa chỉ</b></label>
                <input type="adress" placeholder="Nhập địa chỉ" name="address" required>
                {!! showErrors($errors,'address') !!}

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Nhớ mật khẩu
                </label>

                <p>Tạo tài khoản bạn đồng nghĩa với việc bạn đồng ý với <a href="#" style="color:dodgerblue">Điều khoản và luật pháp</a>.</p>

                <div class="clearfix">
                    <button type="button" class="cancelbtn">Hủy bỏ</button>
                    <button type="submit" name="sbm" class="signupbtn">Đăng ký</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $("#nav-placeholder").load("navbar.html");
        });
    </script>
</body>
</html>