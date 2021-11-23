@extends('layout.admin')
@section('main')

<h1 class="card-header">Danh mục</h1>
<div class="card-body">
<a href="{{route('danhmuc.create')}}" type="button" class="btn btn-primary mb-3">Thêm mới</a>
<div class>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Action</th>
       
      </tr>
    </thead>
        @foreach ($data as $item)
      <tr>
        
        <td>{{$item->id}}</td>
        <td>{{$item->tendanhmuc}}</td>
        <td class="table-action">
          <a href="{{route('danhmuc.edit', $item->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit-2"></i>Sửa</a>
          <a onclick="return confirm('Bạn có muốn xóa {{$item->tendanhmuc}} ?')" href="{{route('danhmuc.delete', $item->id)}}" class="btn btn-danger"><i class="align-middle" data-feather="trash"></i>Xóa</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection