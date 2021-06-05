@extends('Backend.layouts.admin')

@section('title')
<title>Nhóm 10 | Customer</title>
@endsection

@section('content')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    @include('Backend.partials.content-header', ['name' => 'Đơn của Khách', 'key'=>'Thống Kê'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
		<div class="col-md-12">
			<h4>Thống kê Đơn của Khách Hàng: <strong>{{$name}}</strong></h4>
          <table class="table table-bordered">
            <thead>
                <tr class="bg-primary">
                    <th>STT</th>
					<th>Mã Hóa Đơn</th>
					<th>Ngày Đặt</th>
					<th>Tổng Tiền</th>
					<th>Trạng Thái</th>
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
                            @if($order->TrangThai == 1)
                                <a class="btn btn-success">Đã Giao</a>
                            @elseif($order->TrangThai == 2)
                                <a class="btn btn-secondary">Đã Hủy</a>
                            @else
                                <a class="btn btn-warning">Đang Xử Lý</a>  
                            @endif 
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

		<div class="row">
			<div class="col-lg-12">
                   ,<br> <h4>Thống kê:</h4><br><br>
                  <table class="table table-bordered">
                    <thead>
                        <tr class="bg-primary">
                            <th>Đơn Đã Đặt</th>
                            <th>Đơn Đã Hủy</th>
                            <th>Đơn Đang xử lý</th>
                            <th>Doanh Thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $dadat=0; $dahuy=0; $dangxuly=0; ?>
                                @foreach ($orders as $order )
                                    @if($order->TrangThai == 1)
                                        <?php $dadat++; ?>
                                    @elseif($order->TrangThai == 2)
                                        <?php $dahuy++; ?>
                                    @else
                                        <?php $dangxuly++; ?>
                                    @endif 
                                @endforeach
                            <td>
                               {{$dadat}}
                            </td>
                            <td>
                                {{$dahuy}}
                             </td>
                             <td>
                                {{$dangxuly}}
                             </td>
                             <td>
                                <strong>{{number_format($doanhthu)}} Đồng </strong>
                             </td> 
                        </tr>
                    </tbody>
                  </table>
                
			</div><!-- /.col-->
		</div><!-- /.row -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection