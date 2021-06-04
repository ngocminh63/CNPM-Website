@extends('Backend.layouts.admin')

@section('title')
<title>Nhóm 10 | Đơn Hàng</title>
@endsection

@section('content')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    @include('Backend.partials.content-header', ['name' => 'đơn đặt hàng đã xử lý', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <a href="{{route('order.chuaxuly')}}" class="btn btn-success float-right m-2">Đơn Chưa Xử Lý</a>

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
                    <th>STT</th>
                    <th>Mã Hóa Đơn</th>
                    <th>khách hàng</th>
                    <th>Người Nhận</th>
                    <th>Số ĐT</th>
                    <th>Địa chỉ nhận hàng</th>
				          	<th>Trạng thái</th>
                    <th>Ngày đặt hàng</th>
					          <th>Ngày giao/hủy hàng</th>
                    <th>Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $item)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $item->MaHoaDon }}</td>
						<td>{{ $item->customer->fullname }}</td>
						<td>{{ $item->TenNguoiNhan }}</td>
						<td>{{ $item->DienThoai }}</td>
						<td>{{ $item->DiaChiNhan }}</td>
						<td>
							@if($item->TrangThai == 1)
								<a class="btn btn-success">Đã Giao</a>
							@else
							   <a class="btn btn-danger">Đã Hủy</a>
							@endif 
						</td>
						<td>{{ $item->created_at }}</td>
						<td>{{ $item->updated_at }}</td>
						<td>
							<a href="{{route('order.chitiet',['orderId'=> $item->id])}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i>Chi Tiết</a>
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