@extends('Backend.layouts.admin')

@section('title')
<title>Home</title>
@endsection
@section('content')
<?php include(app_path().'/Helpers/function.php'); ?>
    <!--main-->
    <div class="content-wrapper">
  
        @include('Backend.partials.content-header', ['name' => 'Edit User', 'key'=>'Edit'])
    
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <form action="{{ route('user.update', ['id' => $user->id])}}", method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                    {!! showErrors($errors,'email') !!}
                </div>
                <div class="form-group">
                    <label>Full name</label>
                    <input type="text" name="fullname" class="form-control" value="{{$user->fullname}}">
                    {!! showErrors($errors,'fullname') !!}
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="{{$user->address}}">
                    {!! showErrors($errors,'address') !!}
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" name="phone" class="form-control" value="{{$user->phone}}">
                    {!! showErrors($errors,'phone') !!}
                </div>
              
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control" value="">
                        <option @if($user->level == 1) selected @endif value="1">user</option>
                        <option @if($user->level == 2) selected @endif value="2">admin</option>
                    </select>
                </div>
            
                <div class="form-group">
                  
                    <button  onclick="return confirm('Bạn có chắc chắn muốn thay đổi thông tin người này?');" class="btn btn-success"  type="submit">Xác Nhận</button>
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