@extends('Backend.layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')
  
<?php include(app_path().'/Helpers/function.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    @include('Backend.partials.content-header', ['name' => ' Add product', 'key'=>'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('product.store') }}", method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label >Chọn Danh Mục</label>
                    <select class="form-control" name="categories_id">
                      {!! $htmlOption !!}
                    </select>
                  </div>
                <div class="form-group">
                    <label>Mã sản phẩm</label>
                    <input type="text" name="code" class="form-control">
                    {!! showErrors($errors,'code') !!}
                </div>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control">
                    {!! showErrors($errors,'name') !!}
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="text" name="price" class="form-control">
                    {!! showErrors($errors,'price') !!}
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="state" class="form-control">
                        <option value="1">Còn hàng</option>
                        <option value="0">Hết hàng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input id="img" type="file" name="image" class="form-control hidden"
                        onchange="changeImg(this)">
                        {!! showErrors($errors,'image') !!}
                </div>
              
              <button  onclick="return confirm('Bạn có chắc chắn muốn thêm sản phẩm này?');" type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('product.index')}}" class="btn btn-danger" type="button">Huỷ bỏ</a>

            </form>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection