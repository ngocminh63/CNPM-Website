@extends('Backend.layouts.admin')

@section('title')
<title>Nhóm 10 | Quản Trị</title>
@endsection

@section('content')
<div class="content-wrapper">
	<!--main-->
	@include('Backend.partials.content-header', ['name' => 'Nhân viên nghỉ việc', 'key'=>'List'])
	
	 <!-- Main content -->
	 <div class="content">
		<div class="container-fluid">
		  <div class="col-md-12">
			<table class="table table-bordered" height="400px">
				<thead>
					<tr class="bg-primary">
						<th>STT</th>
						<th>Email</th>
						<th>Họ Tên</th>
						<th>Địa Chỉ</th>
						<th>Điện Thoại</th>
						<th>Cấp Bậc</th>
						<th>Thởi gian đến</th>
                        <th>Thởi gian đi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $key => $user)
						<tr>
							<td>{{ $users->firstItem() + $key }}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->fullname}}</td>
							<td>{{$user->address}}</td>
							<td>{{$user->phone}}</td>
							<td>
								@if($user->level == 2)
								 Administrator
								@else
								  Member
								@endif
							</td>
							<td>{{$user->created_at}}</td>
                            <td>{{$user->deleted_at}}</td>
						</tr>
					@endforeach

				</tbody>
			</table>
		  </div>
		  <div class="col-md-12">
			{{ $users->links() }}
			<a href="{{route('user.index')}}" class="btn btn-success" type="button">Trở về</a>

		  </div>
		  </div>
		  <!-- /.row -->
		</div><!-- /.container-fluid -->
	  </div>
	  <!-- /.content -->
	</div>
@endsection
