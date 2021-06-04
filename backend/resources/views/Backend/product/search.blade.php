@extends('Backend.layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    @include('Backend.partials.content-header', ['name' => 'product', 'key'=>'Search'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">ADD</a>
          <div class="float-right m-2">
            <form class="form-inline" method="POST" action="{{route('product.search')}}" >
              {{ csrf_field() }}
                <input name="keyword" class="form-control" type="search"  placeholder = "Nhập từ khóa cần tìm" aria-label="Search" required>
                <select name="choose" class="form-control" aria-label="Search">
                    <option value="code">Mã sản phẩm</option>
                    <option value="name">Tên sản phẩm</option>
                    <option value="cate_name">Tên Loại sản phẩm</option>
                    <option value="state">Tình Trạng</option>
                </select>
                <button class="btn btn-secondary" type="submit">Tìm kiếm</button>
            </form>
        </div>
        </div>
        <div class="col-md-12">
          <table class="table table-bordered" height="400px">
            <thead>
                <tr class="bg-primary">
                    <th>ID</th>
                    <th>Thông tin sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Tình trạng</th>
                    <th>Danh mục</th>
                    <th width='18%'>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                      <div class="row">
                          <div class="col-md-3"><img src="http://127.0.0.1:8000/uploads/{{ $product->image }}" width="100px" class="thumbnail"></div>
                          <div class="col-md-9">
                              <p><strong>Mã sản phẩm : {{ $product->code }}</strong></p>
                              <p>Tên sản phẩm : {{ $product->name }}</p>
                              
                              
                          </div>
                      </div>
                  </td>
                    <td>{{ $product->price }} VND</td>
                    <td>
                        @if($product->state == 1)
                            <a class="btn btn-success" href="#" role="button">Còn hàng</a>
                        @else
                           <a class="btn btn-info" href="#" role="button">Hết hàng</a>
                        @endif 
                    </td>
                    <td>{{$product->cate_name}}</td>
                    <td>
                        <a href="{{ route('product.edit',['id' => $product->id])}}" class="btn btn-warning"><i class="fa fa-wrench" aria-hidden="true"></i> Sửa</a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');" href="{{ route('product.delete',['id'=>$product->id])}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          <a href="{{route('product.index')}}" class="btn btn-danger" type="button">Trở Về</a>
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection