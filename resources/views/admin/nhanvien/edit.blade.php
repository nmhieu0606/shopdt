@extends('layout.admin')
@section('main')
<form action="{{route('nhanvien.update', $data->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="TieuDe" class="form-label">Họ và tên</label>
      <input type="text" value="{{$data->hovaten}}" class="form-control @error('hovaten') is-invalid @enderror" id="hovaten" name="hovaten" >
      @error('hovaten')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
  </div>

  <div class="mb-3">
    <label for="gioitinh">Giới tính <span class="text-danger font-weight-bold">*</span></label>
    <select class="custom-select form-control @error('gioitinh') is-invalid @enderror" id="gioitinh" name="gioitinh" >
      <option value="">-- Choose --</option>
      <option value="0">Nam</option>
      <option value="1" selected="selected">Nữ</option>
    </select>
    @error('gioitinh')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="ngaysinh" class="form-label">Ngày sinh</label>
    <input  value="{{$data->ngaysinh}}" type="date" class="form-control" id="ngaysinh" name="ngaysinh" >
    @error('ngaysinh')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="diachi" class="form-label">Địa chỉ</label>
    <input  value="{{$data->diachi}}" type="text" class="form-control @error('diachi') is-invalid @enderror" id="diachi" name="diachi" >
    @error('diachi')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="sdt" class="form-label">SĐT</label>
    <input  value="{{$data->sdt}}" type="text" class="form-control @error('sdt') is-invalid @enderror" id="sdt" name="sdt" >
    @error('sdt')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="cmnd" class="form-label">CMND</label>
    <input  value="{{$data->cmnd}}" type="text" class="form-control @error('cmnd') is-invalid @enderror" id="cmnd" name="cmnd" >
    @error('cmnd')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="chucvu_id"><span class="text-danger font-weight-bold">*</span></label>
    <select id="chucvu_id" class="form-control custom-select @error('chucvu_id') is-invalid @enderror" name="chucvu_id" required autofocus>
        <option value="">--Chọn chức vụ--</option>
        @foreach($chucvu as $value)
        <option value="{{ $value->id }}" {{($data->chucvu_id== $value->id)?'selected':'' }}>{{$value->tenchucvu}}</option>
        @endforeach
    </select>
    @error('chucvu_id')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input type="text" value="{{$data->email}}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" >
  @error('email')
  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
  @enderror
</div>
  <div class="mb-3">
    <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
    <input  value="{{$data->tendangnhap}}" type="text" class="form-control @error('tendangnhap') is-invalid @enderror" id="tendangnhap" name="tendangnhap" >
    @error('tendangnhap')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mật khẩu</label>
    <input  value="{{$data->password}}" type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
    @error('password')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
  </div>

  <div class="form-group">
    <label for="hinhanh">Ảnh<span class="text-danger font-weight-bold">*</span></label>
    <img class="d-block" src="{{url('public/uploads')}}/{{$data->anh}}"  width="30px"/>
    <input id="file_uploads" type="file" class="form-control @error('file_uploads') is-invalid @enderror" name="file_uploads" value="{{ $data->anh }}" autocomplete="hinhanh" />
    @error('hinhanh')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection