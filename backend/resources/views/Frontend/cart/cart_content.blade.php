<div class="update_cart_url" data-url="{{route('giohang.sua')}}">
    <div class="delete_cart_url" data-url="{{route('giohang.xoa')}}">

    <?php $tong = 0; ?>
@if($carts)

    @foreach ($carts as $id => $cartItem)
        <?php $tong += $cartItem['price']*$cartItem['quantity']; ?>
    <div class="product">
        <div class="product-image">
            <img src="../uploads/{{ $cartItem['image'] }}">
        </div>
        <div class="product-details">
            <div class="product-title">{{ $cartItem['name'] }}</div>
            <p class="product-description">Miêu tả sản phẩm chi tiết</p>
            <br>sản phẩm rất tuyệt vời
        </div>
        <div class="product-price">{{ number_format($cartItem['price'])}} Đ</div>
        <div class="product-quantity">
            <input class="quantity" type="number" value="{{ $cartItem['quantity'] }}" min="1">
        </div>
        <div id="buttonwrap" class="product-state">
            <div class="product-removal">
                <a id="remove" class="remove-product cart_delete" href="" data-id="{{$id}}">
                    Xóa bỏ
                </a>
            </div>
            <div class="product-update">
                <a id="update" class="update-product cart_update" href="" data-id="{{$id}}"> Cập nhật </a>
            </div>
        </div>
        <div class="product-line-price">{{number_format($cartItem['price']*$cartItem['quantity']) }}Đ</div>
    </div>
    @endforeach

    <div class="totals">
        <div class="totals-item">
            <label>Tổng Tiền</label>
            <div class="totals-value" id="cart-subtotal"><?php echo number_format($tong); ?>VNĐ</div>
        </div>

    </div>
    @else
        <h3><strong style="color: red"> Giỏ Hàng Trống</strong></h3>
    @endif
</div>
</div>