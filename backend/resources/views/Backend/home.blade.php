
@extends('Backend.layouts.admin')

@section('title')
<title>Nhóm 10 | Trang Chủ</title>
@endsection

@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('Backend.partials.content-header', ['name' => 'Home', 'key' => 'Trang Chủ'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Dự Án</h5>

                <p class="card-text">
                  <br>
                  Quản lý cửa hàng bán đồ điện tử
                </p>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Miêu Tả</h5>

                <p class="card-text">
                  Xây dựng trang web bán đồ điện tử, với những tính năng đăng bán hàng nhanh, tiện lợi và dễ dàng cho khách hàng và nhân viên.Ngoài ra, việc xây dựng trang web phù hợp với nhu cầu hiện nay khi tình hình dịch bệnh diễn biến xấu..
                </p>
                
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Thành Viên Nhóm</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Gồm Có:</h6>
                <br>
                <p class="card-text">
                  Dương Quang Chiến<br>
                  Đặng Ngọc Thuân<br>
                  Đào Văn Hải<br>
                  Lê Thị Ngọc Minh<strong> Nhóm Trưởng</strong><br>
                  Triệu Kim Cúc<br>
                  Phan Thị Quyên
                </p>
              </div>
            </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection

