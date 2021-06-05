@extends('Backend.layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')

<?php include(app_path().'/Helpers/function.php'); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    @include('Backend.partials.content-header', ['name' => 'Edit category', 'key'=>'Edit'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('cate-update',['id' => $category->id]) }}", method="POST">
              @csrf
              <div class="form-group">
                {!! showErrors($errors,'cate_name') !!}
                <label >ten Danh Muc</label>
                <input class="form-control" type="text" name="cate_name" placeholder="ten danh muc" value="{{$category->cate_name}}">
              </div>

              <div class="form-group">
                <label >Chondanhmuccha</label>
                <select class="form-control" name="parent_id">
                  <option value="0">Chon danh muc cha</option>
                  {!! $htmlOption !!}
                </select>
              </div>
              
              <button  onclick="return confirm('Bạn có chắc chắn muốn sửa danh mục này?');" type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('cate-index')}}" class="btn btn-danger" type="button">Huỷ bỏ</a>

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