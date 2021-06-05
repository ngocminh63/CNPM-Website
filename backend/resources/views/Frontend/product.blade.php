<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sản phẩm</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div id="nav-placeholder">

        </div>
    </div>
    <div class="container">
     
            <h1 class="style">Sản phẩm</h1>
       
        <div class="row">
            @foreach($products as $key => $product)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="../uploads/{{ $product->image }}">
                        </a>

                        <ul class="social">
                            <li><a href="#" data-tip="Xem nhanh"> <i class="bi bi-search"></i></a></li>
                            <li><a href="" data-tip="Thêm vào giỏ hàng"><i class="bi bi-cart"></i></a></li>
                        </ul>

                        <span class="product-new-label">Sale</span>
                        <span class="product-discount-label">20%</span>

                    </div>

                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star disable"></li>
                    </ul>

                    
                    <div class="product-content">
                        <h3 class="title"><a href="#"> {{ $product->name }}</a></h3>
                        <div class="price">{{ $product->price }} VND</div>
                        <a class="add-to-cart" href="#">+ Thêm vào giỏ hàng</a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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