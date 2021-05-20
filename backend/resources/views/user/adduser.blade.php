@extends('layouts.admin')

@section('title', 'Trang quản trị')

@section('content')
<?php include(app_path().'/Helpers/function.php'); ?>
    <!--main-->
    <div class="content-wrapper">
  
        @include('partials.content-header', ['name' => 'User', 'key'=>'Add'])
    
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <form action="{{ route('user.store') }}", method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                    {!! showErrors($errors,'email') !!}
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="text" name="password" class="form-control">
                    {!! showErrors($errors,'password') !!}
                </div>
                <div class="form-group">
                    <label>Full name</label>
                    <input type="text" name="fullname" class="form-control">
                    {!! showErrors($errors,'fullname') !!}
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="address" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="phone" name="phone" class="form-control">
                </div>
              
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <option value="2">admin</option>
                        <option selected value="1">user</option>
                    </select>
                </div>
            
                <div class="form-group">
                  
                    <button class="btn btn-success"  type="submit">Thêm thành viên</button>
                    <a href="{{route('user.index')}}" class="btn btn-danger" type="button">Huỷ bỏ</a>
                </div>
            </div>
                </form>
              </div>
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>

    <!--end main-->
@endsection