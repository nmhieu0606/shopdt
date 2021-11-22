@extends('layout.admin')
@section('main')


<form action="{{route('khachhang.update', $client->id)}}" method="POST">
  @csrf @method('PUT')
  <div class="mb-3">
    <label for="TieuDe" class="form-label">Họ và tên</label>
    <input type="text" value="{{$client->hovaten}}" class="form-control" id="hovaten" name="hovaten" required>
    {{$errors->first('hovaten')}}
</div>

<div class="mb-3">
  <label for="privilege">Giới tính <span class="text-danger font-weight-bold"></span></label>
  <select class="custom-select form-control @error('privilege') is-invalid @enderror" id="gioitinh" name="gioitinh" >
    <option value="" selected="selected">-- Choose --</option>
    <option value="0">Nam</option>
    <option value="1">Nữ</option>
  </select>
  {{$errors->first('gioitinh')}}
</div>

<div class="mb-3">
  <label for="sdt" class="form-label">SĐT</label>
  <input  value="{{$client->sdt}}" type="text" class="form-control" id="sdt" name="sdt" required>
  {{$errors->first('sdt')}}
</div>
<div class="mb-3">
  <label for="cmnd" class="form-label">CMND</label>
  <input  value="{{$client->cmnd}}" type="text" class="form-control" id="cmnd" name="cmnd" required>
  {{$errors->first('cmnd')}}
</div>
<div class="mb-3">
  <label for="ngaysinh" class="form-label">Ngày sinh</label>
  <input  value="{{$client->ngaysinh}}" type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>
  {{$errors->first('ngaysinh')}}
</div>

<div class="mb-3">
  <label for="diachi" class="form-label">Địa chỉ</label>
  <input  value="{{$client->diachi}}" type="text" class="form-control" id="diachi" name="diachi" required>
  {{$errors->first('diachi')}}
</div>
<div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input  value="{{$client->email}}" type="email" class="form-control" id="email" name="email" required>
  {{$errors->first('email')}}
</div>
<div class="mb-3">
  <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
  <input  value="{{$client->tendangnhap}}" type="text" class="form-control" id="tendangnhap" name="tendangnhap" required>
  {{$errors->first('tendangnhap')}}
</div>
<div class="mb-3">
  <label for="password" class="form-label">Mật khẩu</label>
  <input  value="{{$client->password}}" type="text" class="form-control" id="password" name="password" required>
  {{$errors->first('password')}}
</div>
  
  <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection