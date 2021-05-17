@extends('layouts.admin')

@section('title')
<title>Home</title>
@endsection

@section('content')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    @include('partials.content-header', ['name' => 'category', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <a href="{{ route('cate-create') }}" class="btn btn-success float-right m-2">ADD</a>
        </div>
        <div class="col-md-12" >
          <table class="table table-bordered"  height="400px">
            <thead>
              <tr class="bg-primary">
                <th scope="col">STT</th>
                <th scope="col">Tên Danh Mục</th>
                <th scope="col">Hành Động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $key => $category)
                  
              <tr>
                <td>{{ $categories->firstItem() + $key }}</td>
                <td>{{$category->name}}</td>
                <td>
                  <a href="{{route('cate-edit', ['id' => $category->id])}}" class="btn btn-warning"><i class="fa fa-wrench" aria-hidden="true"></i> Sửa</a>
                  <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');" href="{{route('cate-delete', ['id' => $category->id])}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          {{ $categories->links() }}
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection