@extends('layout.admin')

@section('main')
    
<form action="{{route('sanpham.update',$sp->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="tensp" class="form-label">Tên sản phẩm</label>
      <input name="tensp" value="{{$sp->tensp}}" type="text" class="form-control" id="tensp" aria-describedby="tensp">
    </div>

    <div class="form-group">
      <div class="mb-3">
        <label for="file" class="form-label">Ảnh</label>
        <input name="file" type="file" class="form-control" id="file" aria-describedby="file">
      </div>

    <div class="mb-3">
      <label for="soluong" class="form-label">Số lượng</label>
      <input name="soluong" value="{{$sp->soluong}}" type="text" class="form-control" id="soluong" aria-describedby="soluong">
    </div>
    <div class="mb-3">
      <label for="gianhap" class="form-label">Gía nhập</label>
      <input name="gianhap" value="{{$sp->gianhap}}" type="text" class="form-control" id="gianhap" aria-describedby="gianhap">
    </div>

    <div class="mb-3">
      <label for="giaxuat" class="form-label">Gía xuất</label>
      <input name="giaxuat" value="{{$sp->giaxuat}}" type="text" class="form-control" id="giaxuat" aria-describedby="giaxuat">
    </div>

    <div class="mb-3">
      <label for="nhanhieu_id">Nhãn hiệu<span class="text-danger font-weight-bold">*</span></label>
      <select id="nhanhieu_id" class="form-control custom-select @error('nhanhieu_id') is-invalid @enderror" name="nhanhieu_id" required autofocus>
        <option value="">-- Chộn loại --</option>
        @foreach($nhanhieu as $value)
          <option value="{{ $value->id }}" {{ ($sp->nhanhieu_id == $value->id) ? 'selected' : '' }}>{{ $value->nhanhieu }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="xuatxu_id">Xuất xứ<span class="text-danger font-weight-bold">*</span></label>
      <select id="xuatxu_id" class="form-control custom-select @error('xuatxu_id') is-invalid @enderror" name="xuatxu_id" required autofocus>
        <option value="">-- Chộn loại --</option>
        @foreach($xuatxu as $value)
          <option value="{{ $value->id }}" {{ ($sp->xuatxu_id == $value->id) ? 'selected' : '' }}>{{ $value->xuatxu }}</option>
        @endforeach
      </select>
    </div>

   

     <div class="mb-3">
      <label for="baohanh_id">Bảo hành<span class="text-danger font-weight-bold">*</span></label>
      <select id="baohanh_id" class="form-control custom-select @error('baohanh_id') is-invalid @enderror" name="baohanh_id" required autofocus>
        <option value="">-- Chộn loại --</option>
        @foreach($baohanh as $value)
          <option value="{{ $value->id }}" {{ ($sp->baohanh_id == $value->id) ? 'selected' : '' }}>{{ $value->thoigianbaohanh }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="danhmuc_id">danhmuc<span class="text-danger font-weight-bold">*</span></label>
      <select id="danhmuc_id" class="form-control custom-select @error('danhmuc_id') is-invalid @enderror" name="danhmuc_id" required autofocus>
        <option value="">-- Chộn loại --</option>
        @foreach($danhmuc as $value)
          <option value="{{ $value->id }}" {{ ($sp->danhmuc_id == $value->id) ? 'selected' : '' }}>{{ $value->tendanhmuc }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="chitiet" class="form-label">Chi tiết</label>
      <textarea class="form-control ckeditor"  name="chitiet" id="chitiet" cols="10" rows="1">{{$sp->chitiet}}</textarea>
      <div class="invalid-feedback"></div>
    </div>

    <button type="submit" class="btn btn-success">Cập nhật sản phẩm</button>
</form>

@endsection