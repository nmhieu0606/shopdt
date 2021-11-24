@extends('layout.admin')
@section('main')
<a href="{{route('sanpham.create')}}" type="button" class="btn btn-primary">thêm mới sản phẩm</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Giá nhập</th>
        <th scope="col">Giá bán</th>
        <th scope="col">Nhãn hiệu</th>
        <th scope="col">Xuất xứ</th>
        <th scope="col">Bảo hành</th>
        <th scope="col">Danh mục</th>
      </tr>
    </thead>
    <tbody>
        @foreach($sanpham as $sp)
      <tr>
        <th scope="row">{{$sp->id}}</th>
        <td>{{$sp->tensp}}</td>
        <td><img width="50px" src="{{url('storage/hinhanh')}}/{{$sp->anh}}"></td>
        <td>{{$sp->soluong}}</td>
        <td>{{$sp->gianhap}}</td>
        <td>{{$sp->giaxuat}}</td>
        <td>{{$sp->nhanhieu->nhanhieu}}</td>
        <td>{{$sp->xuatxu->xuatxu}}</td>
        <td>{{$sp->baohanh->thoigianbaohanh}}</td>
        <td>{{$sp->danhmuc->tendanhmuc}}</td>
        <td><a href="{{route('sanpham.edit',$sp->id)}}"  class="btn btn-warning">sửa</a></td>
        <td><a onclick="return confirm('bạn có muốn xóa {{$sp->tensp}} không ?')" href="{{route('sanpham.delete',$sp->id)}}"  class="btn btn-danger">xóa</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>



    
@endsection