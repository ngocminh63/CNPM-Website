@extends('layouts.admin')

@section('title')
<title>Trang Quản Trị</title>
@endsection

@section('content')
<div class="content-wrapper">
	<!--main-->
	@include('partials.content-header', ['name' => 'User', 'key'=>'List'])
	
	 <!-- Main content -->
	 <div class="content">
		<div class="container-fluid">
		  <div class="row">
			<div class="col-md-12">
			<a href="{{route('user.create')}}" class="btn btn-success float-right m-2">ADD</a>
		  </div>
		  <div class="col-md-12">
			<table class="table table-bordered" height="400px">
				<thead>
					<tr class="bg-primary">
						<th>STT</th>
						<th>Email</th>
						<th>FullName</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Level</th>
						<th width='18%'>Tùy chọn</th>
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
							<td>
								<a href="{{route('user.edit', ['id' => $user->id])}}" class="btn btn-warning"><i class="fa fa-wrench" aria-hidden="true"></i> Sửa</a>
								<a onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');" href="{{route('user.delete', ['id' => $user->id])}}"  class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
							</td>
						</tr>
					@endforeach

				</tbody>
			</table>
		  </div>
		  <div class="col-md-12">
			{{ $users->links() }}
		  </div>
		  </div>
		  <!-- /.row -->
		</div><!-- /.container-fluid -->
	  </div>
	  <!-- /.content -->
	</div>
@endsection
