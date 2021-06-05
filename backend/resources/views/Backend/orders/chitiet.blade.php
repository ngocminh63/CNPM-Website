@extends('Backend.layouts.admin')

@section('title')
<title>Nhóm 10 | Đơn Hàng</title>
@endsection

@section('content')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    @include('Backend.partials.content-header', ['name' => 'Đơn Hàng', 'key'=>'Chi Tiết'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
		<div class="col-md-12">
			<h4>Chi Tiết Đơn Hàng</h4>
          <table class="table table-bordered">
            <thead>
                <tr class="bg-primary">
					<th>STT</th>
					<th>Mã SP</th>
					<th>Tên SP</th>
					<th>Hình SP</th>
					<th>Số Lượng</th>
					<th>Giá Sản Phẩm</th>
					<th>Thành Tiền</th>
                </tr>
            </thead>
            <tbody>
				<?php $tongtien = 0 ?>
				@foreach ($order->details as $key => $detail)
				<?php $tongtien = $tongtien + $detail->product->price * $detail->quantity ?>
					<tr>
						<td>{{$key + 1 }}</td>
						<td>{{ $detail->product->code }}</td>
						<td>{{ $detail->product->name }}</td>
						<td>
							<div class="col-md-3"><img src="http://127.0.0.1:8000/uploads/{{ $detail->product->image }}" width="100px" class="thumbnail"></div>
						</td>
						<td>{{ $detail->quantity }}</td>
						<td>{{ $detail->product->price }}</td>
						<td>{{ $detail->product->price * $detail->quantity }}</td>
					</tr>
				@endforeach
            </tbody>
          </table>
        </div>
       
       
        </div>

		<div class="row">
			<div class="col-lg-12">
					<div>
						<div class="float-left m-2">
							<h4><label><strong style="color:royalblue">Tiền Ship: </strong>{{$order->ship->gia}} đồng  => </label></h4>
						</div>
						<div class="float-left m-2">
							<h4><label><strong style="color:goldenrod">Tổng Tiền: </strong><?php echo $tongtien + $order->ship->gia ?> đồng</label></h4>
						</div>

					</div>
					<a href="{{ route('order.chuaxuly') }}" class="btn btn-success float-right m-2">Trở Về</a>

			</div><!-- /.col-->
		</div><!-- /.row -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection