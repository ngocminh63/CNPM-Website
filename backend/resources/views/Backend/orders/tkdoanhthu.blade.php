@extends('Backend.layouts.admin')

@section('title')
<title>Nhóm 10 | Hóa Đơn</title>
@endsection

@section('content')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    @include('Backend.partials.content-header', ['name' => 'Doanh Thu', 'key'=>'Thống Kê'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
		<div class="col-md-12">
			<h4>Thống kê Đơn Hàng <strong><?php echo $choose .': '. $thoigian ?></strong></h4>
          <table class="table table-bordered">
            <thead>
                <tr class="bg-primary">
                    <th>STT</th>
					<th>Mã Hóa Đơn</th>
					<th>Ngày Đặt</th>
					<th>Tổng Tiền</th>
					<th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
				<?php $tongtien = 0;$tienthuduoc=0; $doanhthu = 0; ?>
				@foreach ($orders as $key => $order)

					<tr>
                        <td>{{$key + 1 }}</td>
						<td>{{ $order->MaHoaDon}}</td>
						<td>
                            {{$order->created_at}}
						</td>
						<td>
                            @foreach ($order->details as $detail )
                                <?php $tongtien = $tongtien + $detail->product->price * $detail->quantity ?>
                                <?php if($order->TrangThai ==1)
                                    $tienthuduoc =  $tongtien;
                                ?>
                            @endforeach
                            <?php echo number_format($tongtien); ?> Đồng
                            <?php $tongtien = 0;?>
                        </td>
						<td>
                            <a href="{{route('order.chitiet',['orderId'=> $order->id])}}" class="btn btn-info">Chi Tiết</a>
                        </td>
                        <?php $doanhthu = $doanhthu + $tienthuduoc ?>
                        <?php $tienthuduoc = 0; ?>
					</tr>
                    
				@endforeach
                
            </tbody>
          </table>
        </div>
        
        </div>


        <?php $dadat=0;?>
        @foreach ($orders as $order )
            <?php $dadat++; ?>
        @endforeach

        <div class="row">
			<div class="col-lg-12"  style="padding-right: 185px">
                <br> <h4>Doanh Thu:</h4><br>
					<div class="float-left">
						<div>
							<h4><label><strong style="color:royalblue">Số Đơn Giao Được: </strong>{{$dadat}} đơn</label></h4>
						</div>
						<div >
							<h4><label><strong style="color:goldenrod">Tổng Tiền Thu Được: </strong>{{number_format($doanhthu)}} đồng</label></h4>
						</div>

					</div>
					<a href="{{ route('order.chuaxuly') }}" class="btn btn-success float-right">Trở Về</a>

			</div><!-- /.col-->
		</div><!-- /.row -->

		
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection