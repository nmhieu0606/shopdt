@extends('layout.admin')
@section('main')

<h5 class="card-header">Chức vụ</h5>
<div class="card-body">
<a href="{{route('chucvu.create')}}" type="button" class="btn btn-primary mb-3">Thêm mới</a>
<div class>
  <table class="table table-bordered table-hover mb-0">
    <thead>
      <tr>
        <th>ID</th>
        <th >Tên chức vụ</th>
        <th >Quyền</th>
      </tr>
    </thead>
        @foreach ($data as $item)
        
      <tr> 
        <td width="5%">{{$item->id}}</td>
        <td width="10%">{{$item->tenchucvu}}</td>
        <td width="10%">{{$item->quyen}}</td>
        
        <td width="10%"><a href="{{route('chucvu.edit', $item->id)}}" class="btn btn-primary">Sửa</a></td>
        <td width="10%"><a onclick="return confirm('Bạn có muốn xóa {{$item->hovaten}} ?')" href="{{route('chucvu.delete', $item->id)}}" class="btn btn-primary">Xóa</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

@endsection