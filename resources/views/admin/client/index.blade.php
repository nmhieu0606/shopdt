@extends('layout.admin')
@section('main')

<h5 class="card-header">Khách hàng</h5>
<div class="card-body">
<a href="{{route('khachhang.create')}}" type="button" class="btn btn-primary mb-3">Thêm mới</a>
<div class>
  <table class="table table-bordered table-hover mb-0">
    <thead>
      <tr>
        <th>ID</th>
        <th >Họ và tên</th>
        <th >Giới tính</th>
        <th >SĐT</th>
        <th>CMND</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Email</th>
        <th>Tên đăng nhập</th>
       
      </tr>
    </thead>
        @foreach ($client as $item)
        
      <tr> 
        <td width="5%">{{$item->id}}</td>
        <td width="10%">{{$item->hovaten}}</td>
        <td>
          @if ($item->gioitinh==0)
              Nam
              
          @else
              Nữ
          @endif
      </td>
        <td width="10%">{{$item->sdt}}</td>
        <td width="10%">{{$item->cmnd}}</td>
        <td width="10%">{{$item->ngaysinh}}</td>
        <td width="10%">{{$item->diachi}}</td>
        <td width="10%">{{$item->email}}</td>
        <td width="10%">{{$item->tendangnhap}}</td>
        {{-- <td>{{$item->password}}</td> --}}
        <td width="10%"><a href="{{route('khachhang.edit', $item->id)}}" class="btn btn-primary">Sửa</a></td>
        <td width="5%"><a onclick="return confirm('Bạn có muốn xóa {{$item->hovaten}} ?')" href="{{route('khachhang.delete', $item->id)}}" class="btn btn-primary">Xóa</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

@endsection