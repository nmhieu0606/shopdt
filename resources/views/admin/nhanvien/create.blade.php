@extends('layout.admin')
@section('main')
<h5 class="mb-3"> Thêm nhân viên</h5>

<form action="{{route('nhanvien.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="hovaten" class="form-label">Họ và tên</label>
      <input name="hovaten" type="text" class="form-control @error('hovaten') is-invalid @enderror" id="hovaten" aria-describedby="hovaten" >
      @error('hovaten')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="privilege">giới tính <span class="text-danger font-weight-bold">*</span></label>
      <select class="custom-select form-control @error('privilege') is-invalid @enderror" id="gioitinh" name="gioitinh" >
        <option value="">-- Choose --</option>
        <option value="0">Nam</option>
        <option value="1" selected="selected">Nữ</option> 
      </select>
      @error('privilege')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
      
    </div>
    <div class="mb-3">
      <label for="ngaysinh" class="form-label">Ngày sinh</label>
      <input type="date" class="form-control @error('ngaysinh') is-invalid @enderror" id="ngaysinh" name="ngaysinh" >
      @error('ngaysinh')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="diachi" class="form-label">Địa chỉ</label>
      <input type="text" class="form-control @error('diachi') is-invalid @enderror" id="diachi" name="diachi" >
      @error('diachi')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>

    <div class="mb-3">
      <label for="sdt" class="form-label">SĐT</label>
      <input type="text" class="form-control @error('sdt') is-invalid @enderror" id="sdt" name="sdt" >
      @error('sdt')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>

    <div class="mb-3">
      <label for="cmnd" class="form-label">CMND</label>
      <input type="text" class="form-control @error('cmnd') is-invalid @enderror" id="cmnd" name="cmnd" >
      @error('cmnd')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
   
    

    
    <div class="form-group">
      <label for="chucvu_id"><span class="text-danger font-weight-bold">*</span></label>
      <select id="chucvu_id" class="form-control custom-select @error('chucvu_id') is-invalid @enderror" name="chucvu_id" >
          <option value="">-- Chọn chức vụ --</option>
          @foreach($chucvu as $value)
              <option value="{{$value->id }}">{{ $value->tenchucvu }}</option>
          @endforeach
      </select>

      @error('chucvu_id')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror

  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" >
    @error('email')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
  </div>

    <div class="mb-3">
      <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
      <input type="text" class="form-control @error('tendangnhap') is-invalid @enderror" id="tendangnhap" name="tendangnhap" >
      @error('tendangnhap')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Mật khẩu</label>
      <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
      @error('password')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
    </div>
   
    <div class="mb-3">
        <label for="file_uploads" class="form-label">Ảnh</label>
        <input name="file_uploads" type="file" class="form-control @error('file_uploads') is-invalid @enderror" id="file_uploads" value="{{ old('file_uploads') }}" aria-describedby="file_uploads" >
        @error('file_uploads')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
      </div>

    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection