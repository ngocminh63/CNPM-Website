@extends('Backend.layouts.admin')

@section('title')
<title>Nhóm 10 | Đơn Hàng</title>
@endsection

@section('content')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    @include('Backend.partials.content-header', ['name' => 'đơn đặt hàng chưa xử lý', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          @if(session('success'))
          <div class="alert bg-success" role="alert">
            {{session('success')}} 
          </div>
        @endif

          <div class="col-md-12">
          <a href="{{route('order.daxuly')}}" class="btn btn-success float-right m-2">Đơn Đã Xử Lý</a>

          <div class="float-right m-2">
            <form class="form-inline" method="POST" action="{{route('order.tkdoanhthu')}}" >
              {{ csrf_field() }}
                <input name="thoigian" class="form-control" type="search"  placeholder = "Thống kê doanh thu..." style="width: 185px" required>
                <select name="choose" class="form-control" aria-label="Search">
                    <option value="Tháng">Tháng</option>
                    <option value="Năm">Năm</option>
                </select>
                <button class="btn btn-secondary" type="submit">Thống Kê</button>
            </form>
        </div>
        </div>
        <div class="col-md-12">
          <table class="table table-bordered" height="400px">
            <thead>
                <tr class="bg-primary">
                    <th>Mã HĐ</th>
                    <th>Tên khách hàng</th>
                    <th>Tên Người Nhận</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa chỉ nhận hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Chi Tiết</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $item)
					<tr>
						<td>{{ $item->MaHoaDon }}</td>
						<td>{{ $item->customer->fullname }}</td>
						<td>{{ $item->TenNguoiNhan }}</td>
            <td>{{ $item->DienThoai }}</td>
            <td>{{ $item->DiaChiNhan }}</td>
            <td>{{ $item->created_at }}</td>
						<td>
              <a href="{{route('order.chitiet',['orderId'=> $item->id])}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i>Chi Tiết</a>
						</td>
            <td>
              <a href="{{route('order.xuly',['orderId'=> $item->id, 'trangthai' => '1'])}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Thành Công</a>
              <a href="{{route('order.xuly',['orderId'=> $item->id, 'trangthai' => '2'])}}" class="btn btn-danger"><i class="fa fa-pencil" aria-hidden="true"></i>Hủy Đơn</a>
            </td>
					</tr>
				@endforeach

            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          {{ $orders->links() }}
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection