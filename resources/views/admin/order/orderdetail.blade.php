@extends('layout.admin');
@section('main')
<table class="table">
   
    <tr>
        <td>Tên khách hàng</td>
        <td>{{$od->khachhang->hovaten}}</td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td>{{$od->khachhang->diachi}}</td>
    </tr>
    <tr>
        <td>SĐT</td>
        <td>{{$od->khachhang->sdt}}</td>
    </tr>
   
</table>
<hr>

@if (isset($od->nhanvien_id))

<table class="table">
    <tr>
        <td>Tên khách hàng</td>
        <td>{{$od->nhanvien->hovaten}}</td>
    </tr>
    <tr>
        <td>SĐT</td>
        <td>{{$od->nhanvien->sdt}}</td>
    </tr>
   
</table>
    
@endif

<hr>

<table class="table">
    <thead>
      <tr>
        
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Thành tiền</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($oddt as $item)   
      <tr>
          <td>{{$item->sanpham->tensp}}</td>
          <td>{{$item->soluong}}</td>
          <td>{{number_Format($item->dongia)}}</td>
       
      </tr>
        @endforeach
    </tbody>
  </table>

@endsection