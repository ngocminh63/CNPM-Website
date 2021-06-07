<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang thanh toán</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="{{asset('style3.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <!-- partial:index.partial.html -->
    <div class="wrapper2">
        <div id="nav-placeholder">

        </div>
    </div>
    <div class="pagecontainer">
        <div class="container">       

                <div class="row">
                    <form action="{{route('giohang.xlthanhtoan')}}", method="post">
                        @csrf
                        <div class="col-7 col">
                            <h3 class="topborder"><span>Xác Nhận Đặt Hàng</span></h3>
                            <div class="width50 padright">
                                <label for="fname">Họ và đệm</label>
                                <input type="text" name="fname" id="fname" required>
                            </div>
                            <div class="width50">
                                <label for="lname">Tên</label>
                                <input type="text" name="lname" id="lname" required>
                            </div>
                            <label for="address">Địa chỉ Nhận Hàng</label>
                            <input type="text" name="address" id="address" required>
                            <div class="width50 padright">
                                <label for="province">Tỉnh thành</label>
                                <select name="province" id="province" class="phi" required onchange="genderChanged(this)">
                                    <option value="">Chọn Tỉnh Thành Phố</option>
                                    <?php  $ship[]= ''; ?>
                                    @foreach ($ships as $key => $item)
                                        <option
                                        value="{{$item->id}}">{{$item->tenTing}} </option>
                                    @endforeach

                                </select>
                            </div>
                            </div>

                            <div class="width50 padright">
                                <label for="tel">Số điện thoại</label>
                                <input type="text" name="tel" id="tel" required>
                            </div>

                            <div class="col-6 col order">
                                <div><h5>Tiền Đơn Hàng:</h5><p id="tiendonhang"> <?php echo $tong; ?></p> VNĐ </div>
                                <div><h5>Phí Vận Chuyển:</h5> 
                                    <p id="show_message">Bạn chưa chọn Tỉnh Thành</p>
                                </div>
                                <div><h3>Giá tổng tiền:</h3><p id="tongtien"></p> VNĐ</div>

                                <input type="submit" name="submit" value="Đặt hàng" class="redbutton">
                            </div>
                        </form>
                </div>
            </div>
        </div>
    
    <!-- partial -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function genderChanged(obj)
    {
        var message = document.getElementById('show_message');
        var tongtien = document.getElementById('tongtien');
        var value = obj.value;
        if (value === ''){
            message.innerHTML = "Bạn chưa chọn Tỉnh Thành";
        }
        else if (value === '1'){
            message.innerHTML = "40,000 VNĐ";
            tongtien.innerHTML = <?php echo json_encode($tong + 40000, JSON_HEX_TAG); ?>
        }
        else if (value === '2'){
            message.innerHTML = "20,000 VNĐ";
            tongtien.innerHTML = <?php echo json_encode($tong + 20000, JSON_HEX_TAG); ?>

        }
        else if (value === '3'){
            message.innerHTML = "30,000 VNĐ";
            tongtien.innerHTML = <?php echo json_encode($tong + 30000, JSON_HEX_TAG); ?>

        }
        else if (value === '4'){
            message.innerHTML = "25,000 VNĐ";
            tongtien.innerHTML = <?php echo json_encode($tong + 25000, JSON_HEX_TAG); ?>

        }
        else if (value === '5'){
            message.innerHTML = "35,000 VNĐ";
            tongtien.innerHTML = <?php echo json_encode($tong + 35000, JSON_HEX_TAG); ?>

        }
        else if (value === '7'){
            message.innerHTML = "30,000 VNĐ";
            tongtien.innerHTML = <?php echo json_encode($tong + 30000, JSON_HEX_TAG); ?>

        }
        else if (value === '8'){
            message.innerHTML = "35,000 VNĐ";
            tongtien.innerHTML = <?php echo json_encode($tong + 35000, JSON_HEX_TAG); ?>

        }
        else if (value === '9'){
            message.innerHTML = "20,000 VNĐ";
            tongtien.innerHTML = <?php echo json_encode($tong + 20000, JSON_HEX_TAG); ?>

        }

    }
            // $(document).change(function () {
            //     let urlChiPhi = $('.chiphi').data('url');
            //     let id = $('.chiphi').data('id');
            //     alert(id);
            //    $.ajax({
            //     type: "GET",
            //     url: "urlChiPhi",
            //     dataType : 'json',
            //     success : function (data){
            //         alert(data.result);
            //             //$('#phivanchuyen').innerHTML(data.result).;
            //     }
            // });
            //})
            // function xlChiPhi(event){
            //     event.preventDefault();
            //     let urlChiPhi =  $('.chiphi').data('url');
            //     alert(urlChiPhi);
            // //     $.ajax({
            // //     type: "GET",
            // //     url: "urlChiPhi",
            // //     dataType : 'json',
            // //     success : function (data){
            // //         alert(data.result);
            // //             //$('#phivanchuyen').innerHTML(data.result).;
            // //     }
            // // });
            // }
            // $(function(){
            //     $('.phi').on('onchange', xlChiPhi);
            // })
        </script>
</body>
</html>
