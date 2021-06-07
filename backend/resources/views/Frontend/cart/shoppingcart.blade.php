<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Giỏ hàng</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="{{asset('style2.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">


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
                    <li><a href="{{route('login')}}">Admin</a></li>
                </div>  
        

            </nav>
		</div>
	</div>
	<!-- partial:index.partial.html -->
	<div class="pagecontainer">
		<form action="{{route('giohang.thanhtoan')}}" style="border:5px solid #ccc">
			<div class="container">
				<h1>Giỏ hàng</h1>
                <div class="shopping-cart" >
                    <div class="column-labels">
                        <label class="product-image">Hình ảnh</label>
                        <label class="product-details">Sản phẩm</label>
                        <label class="product-price">Giá</label>
                        <label class="product-quantity">Số lượng</label>
                        <label class="product-removal">Xóa bỏ</label>
                        <label class="product-line-price">Giá tiền</label>
                    </div>
                    <div class="cart_wrapper">   
                        @include('Frontend.cart.cart_content')
                    </div>

                    <button class="checkout">Thanh toán</button>
                </div>
			</div>
			</form>
		</div>
			<!-- partial -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script>
             window.onload = function () {
                function cartUpdate(event){
                    event.preventDefault();

                    let urlUpdateCart = $('.update_cart_url').data('url');
                    let id = $(this).data('id');
                    let quantity = $(this).parents('div').find('input.quantity').val();
                    $.ajax({
                        type: "GET",
                        url: urlUpdateCart,
                        data: {id:id, quantity:quantity },
                        success: function (data) {
                            if(data.code ===200){
                                $('.cart_wrapper').html(data.cart_content);
                                alert('Cập nhật thành công');
                            }
                        },
                        error: function () {
                            
                        }
                    });
                }
                    
                function cartDelete(event){
                    event.preventDefault();

                    let urlDeleteCart = $('.delete_cart_url').data('url');
                    let id = $(this).data('id');
                    $.ajax({
                        type: "GET",
                        url: urlDeleteCart,
                        data: {id:id},
                        success: function (data) {
                            if(data.code ===200){
                                $('.cart_wrapper').html(data.cart_content);
                                alert('Xóa thành công');
                            }
                        },
                        error: function () {
                            
                        }
                    });
                }                

                $(function(){
                    $('.cart_update').on('click', cartUpdate);
                    $('.cart_delete').on('click', cartDelete);
                })
            }
            </script>
</body>
</html>
