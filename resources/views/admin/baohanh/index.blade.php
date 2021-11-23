@extends('layout.admin')
@section('main')

<h1 class="card-header">Bảo hành</h1>
<div class="card-body">
<a href="{{route('baohanh.create')}}" type="button" class="btn btn-primary mb-3">Thêm mới</a>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Thời gian bảo hành</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
        @foreach ($data as $item)
      <tr>
        
        <td>{{$item->id}}</td>
        <td>{{$item->thoigianbaohanh}}</td>
        <td class="table-action">
          <a href="{{route('baohanh.edit', $item->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit-2"></i>Sửa</a>
          <a onclick="return confirm('Bạn có muốn xóa {{$item->thoigianbaohanh}} ?')" href="{{route('baohanh.delete', $item->id)}}" class="btn btn-danger"><i class="align-middle" data-feather="trash"></i>Xóa</a>
        </td>  
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
  @endsection