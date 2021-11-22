@extends('layout.admin')
@section('main')
<h5 class="mb-3">Thêm khách hàng</h5>

<form action="{{route('khachhang.store')}}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="hovaten" class="form-label">Họ và tên <span class="text-danger font-weight-bold">*</label>
    <input name="hovaten" type="text" class="form-control" id="hovaten" aria-describedby="hovaten">
    
    {{$errors->first('hovaten')}}
  </div>
  
  <div class="mb-3">
    <label for="privilege">Giới tính <span class="text-danger font-weight-bold">*</span></label>
    <select class="custom-select form-control @error('privilege') is-invalid @enderror" id="gioitinh" name="gioitinh" >
      <option value="" selected="selected">-- Choose --</option>
      <option value="0">Nam</option>
      <option value="1">Nữ</option>
    </select>
    {{$errors->first('gioitinh')}}
  </div>

  <div class="mb-3">
    <label for="sdt" class="form-label">SĐT <span class="text-danger font-weight-bold">*</label>
    <input type="text" class="form-control" id="sdt" name="sdt" >
    
    {{$errors->first('sdt')}}
  </div>
  <div class="mb-3">
    <label for="cmnd" class="form-label">CMND <span class="text-danger font-weight-bold">*</label>
    <input type="text" class="form-control" id="cmnd" name="cmnd" >
    
    {{$errors->first('cmnd')}}
  </div>
  <div class="mb-3">
    <label for="ngaysinh" class="form-label">Ngày sinh <span class="text-danger font-weight-bold">*</label>
    <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" >
    
    {{$errors->first('ngaysinh')}}
  </div>
  
  <div class="mb-3">
    <label for="diachi" class="form-label">Địa chỉ <span class="text-danger font-weight-bold">*</label>
    <input type="text" class="form-control" id="diachi" name="diachi" >
    
    {{$errors->first('diachi')}}
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email <span class="text-danger font-weight-bold">*</label>
    <input type="text" class="form-control" id="email" name="email" >
    
    {{$errors->first('email')}}
  </div>
  <div class="mb-3">
    <label for="tendangnhap" class="form-label">Tên đăng nhập <span class="text-danger font-weight-bold">*</label>
    <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" >
    {{$errors->first('tendangnhap')}}
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mật khẩu <span class="text-danger font-weight-bold">*</label>
    <input type="text" class="form-control" id="password" name="password" >
    
    {{$errors->first('password')}}
  </div>
 
  <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection