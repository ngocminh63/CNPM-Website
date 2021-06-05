@extends('Backend.layouts.admin')

@section('title')
<title>Nhóm 10 | Khách Hàng</title>
@endsection

@section('content')
<div class="content-wrapper">
	<!--main-->
	@include('Backend.partials.content-header', ['name' => 'Customer', 'key'=>'List'])
	
	 <!-- Main content -->
	 <div class="content">
		<div class="container-fluid">
		  <div class="row">
		  <div class="col-md-12">
			<table class="table" height="400px">
				<thead>
					<tr class="bg-primary">
						<th>STT</th>
						<th>Email</th>
						<th>FullName</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Giới Tính</th>
						<th width='18%'>Hóa Đơn của khách</th>
					</tr>
				</thead>
				<tbody>
					@foreach($customers as $key => $customer)
						<tr>
							<td>{{ $customers->firstItem() + $key }}</td>
							<td>{{$customer->email}}</td>
							<td>{{$customer->fullname}}</td>
							<td>{{$customer->address}}</td>
							<td>{{$customer->phone}}</td>
							<td>
								@if($customer->gender == 2)
								 Nam
								@else
								  Nữ
								@endif
							</td>
							<td>
								<a href="{{route('customer.thongke',['id' => $customer->id])}}" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
							</td>
						</tr>
					@endforeach

				</tbody>
			</table>
		  </div>
		  <div class="col-md-12">
			{{ $customers->links() }}
		  </div>
		  </div>
		  <!-- /.row -->
		</div><!-- /.container-fluid -->
	  </div>
	  <!-- /.content -->
	</div>
@endsection
