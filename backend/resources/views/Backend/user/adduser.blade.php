@extends('Backend.layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')
<?php include(app_path().'/Helpers/function.php'); ?>
    <!--main-->
    <div class="content-wrapper">
  
        @include('Backend.partials.content-header', ['name' => 'Add User', 'key'=>'Add'])
    
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <form action="{{ route('user.store') }}", method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
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
                    <input type="text" name="address" class="form-control">
                    {!! showErrors($errors,'address') !!}
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" name="phone" class="form-control">
                    {!! showErrors($errors,'phone') !!}
                </div>
              
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <option value="2">admin</option>
                        <option selected value="1">user</option>
                    </select>
                </div>
            
                <div class="form-group">
                  
                    <button  onclick="return confirm('Bạn có chắc chắn muốn thêm người dùng này?');" class="btn btn-success"  type="submit">Thêm thành viên</button>
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