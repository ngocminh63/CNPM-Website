@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')
  
<?php include(app_path().'/Helpers/function.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    @include('partials.content-header', ['name' => 'product', 'key'=>'Edit'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{route('product.update',['id'=>$product->id])}}", method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label >Chọn Danh Mục</label>
                    <select class="form-control" name="categories_id">
                      {!! $htmlOption !!}
                    </select>
                  </div>
                <div class="form-group">
                    <label>Mã sản phẩm</label>
                    <input type="text" name="code" class="form-control" value="{{$product->code}}">
                    {!! showErrors($errors,'code') !!}
                </div>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                    {!! showErrors($errors,'name') !!}
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="text" name="price" class="form-control" value="{{$product->price}}">
                    {!! showErrors($errors,'price') !!}
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="state" class="form-control">
                        <option @if($product->state == 1) selected @endif value="1">Còn hàng</option>
                        <option @if($product->state == 0) selected @endif value="0">Hết hàng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <img id="avatar" class="thumbnail" width="100%" height="350px" src="../../../uploads/{{$product->image}}">
                    <label>Thay đổi ảnh</label>
                    <input id="img" type="file" name="image" class="form-control hidden"
                        onchange="changeImg(this)">
                </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
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