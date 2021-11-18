@extends('layout.admin')
@section('main')

<h1 class="card-header">Nhãn hiệu</h1>
<div class="card-body">
<a href="{{route('nhanhieu.create')}}" type="button" class="btn btn-primary">Thêm mới</a>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nhãn hiệu</th>
        <th>Action</th>
      </tr>
    </thead>
        @foreach ($data as $item)
      <tr> 
        <td>{{$item->id}}</td>
        <td>{{$item->nhanhieu}}</td>
        <td class="table-action">
          <a href="{{route('nhanhieu.edit', $item->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit-2"></i>Sửa</a>
          <a onclick="return confirm('Bạn có muốn xóa {{$item->nhanhieu}} ?')" href="{{route('nhanhieu.delete', $item->id)}}" class="btn btn-danger"><i class="align-middle" data-feather="trash"></i>Xóa</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
  @endsection