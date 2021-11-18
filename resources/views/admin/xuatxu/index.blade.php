@extends('layout.admin')
@section('main')

<h1 class="card-header">Xuất xứ</h1>
<div class="card-body">
  <a href="{{route('xuatxu.create')}}" type="button" class="btn btn-primary">Thêm mới</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Xuất xứ</th>
        <th scope="col">Action</th>
       
      </tr>
    </thead>
        @foreach ($xuatxu as $item)
      <tr>
        
        <td>{{$item->id}}</td>
        <td>{{$item->xuatxu}}</td>
        <td class="table-action">
          <a href="{{route('xuatxu.edit', $item->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit-2"></i>Sửa</a>
          <a onclick="return confirm('Bạn có muốn xóa {{$item->xuatxu}} ?')" href="{{route('xuatxu.delete', $item->id)}}" class="btn btn-danger"><i class="align-middle" data-feather="trash"></i>Xóa</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection