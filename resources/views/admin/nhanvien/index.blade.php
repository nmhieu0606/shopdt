@extends('layout.admin')
@section('main')

<h5 class="card-header">Nhân viên</h5>
<div class="card-body">
<a href="{{route('nhanvien.create')}}" type="button" class="btn btn-primary mb-3">Thêm mới</a>
<div class>
  <table class="table table-bordered table-hover mb-0">
    <thead>
      <tr>
        <th>ID</th>
        <th >Họ và tên</th>
        <th >Giới tính</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th >SĐT</th>
        <th>CMND</th>
        <th>Chức vụ</th>
        <th>Tên đăng nhập</th>
        <th>Ảnh</th>
      </tr>
    </thead>
        @foreach ($data as $item)
        
      <tr> 
        <td width="5%">{{$item->id}}</td>
        <td width="10%">{{$item->hovaten}}</td>
        <td width="3%">{{$item->gioitinh}}</td>
        <td width="10%">{{$item->ngaysinh}}</td>
        <td width="10%">{{$item->diachi}}</td>
        <td width="8%">{{$item->sdt}}</td>
        <td width="8%">{{$item->cmnd}}</td>
        <td width="10%">{{$item->chucvu_id}}</td>
        <td width="10%">{{$item->tendangnhap}}</td>
        <td><img src="{{url('public/uploads')}}/{{$item->anh}}" width="30px"></td>
        
        <td width="5%"><a href="{{route('nhanvien.edit', $item->id)}}" class="btn btn-primary">Sửa</a></td>
        <td width="5%"><a onclick="return confirm('Bạn có muốn xóa {{$item->hovaten}} ?')" href="{{route('nhanvien.delete', $item->id)}}" class="btn btn-primary">Xóa</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

@endsection