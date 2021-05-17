@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    @include('partials.content-header', ['name' => 'product', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">ADD</a>
        </div>
        <div class="col-md-12">
          <table class="table table-bordered" height="400px">
            <thead>
                <tr class="bg-primary">
                    <th>STT</th>
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
                    <td>{{ $products->firstItem() + $key }}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-3"><img src="../uploads/{{ $product->image }}" width="100px" class="thumbnail"></div>
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
                    <td>{{ $product->category->name }}</td>
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
          {{ $products->links() }}
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection