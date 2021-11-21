@extends('layout.admin')
@section('main')

<h1 class="card-header">Tình trạng đơn hàng</h1>
<div class="card-body">
<a href="{{route('tinhtrang.create')}}" type="button" class="btn btn-primary">Thêm mới</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tình trạng</th>
        <th scope="col">Action</th>
       
      </tr>
    </thead>
        @foreach ($data as $item)
      <tr>
        
        <td>{{$item->id}}</td>
        <td>{{$item->tinhtrang}}</td>
        <td class="table-action">
          <a href="{{route('tinhtrang.edit', $item->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit-2"></i>Sửa</a>
          <a onclick="return confirm('Bạn có muốn xóa {{$item->tinhtrang}} ?')" href="{{route('tinhtrang.delete', $item->id)}}" class="btn btn-danger"><i class="align-middle" data-feather="trash"></i>Xóa</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
  @endsection