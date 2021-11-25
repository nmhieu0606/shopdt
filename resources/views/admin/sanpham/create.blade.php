@extends('layout.admin')

@section('main')

<form action="{{route('sanpham.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="tensp" class="form-label">tên sản phẩm</label>
      <input name="tensp" type="text" class="form-control @error('tensp') is-invalid @enderror" id="tensp" aria-describedby="tensp" >
      @error('tensp')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>


    <div class="mb-3">
      <label for="file" class="form-label">Ảnh</label>
      <input name="file" type="file" class="form-control @error('file') is-invalid @enderror" id="file" value="{{ old('file') }}" aria-describedby="file" >
        @error('file')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>

    <div class="mb-3">
      <label for="soluong" class="form-label">Số lượng</label>
       <input name="soluong" type="text" class="form-control @error('soluong') is-invalid @enderror" id="soluong" aria-describedby="soluong" >
      @error('soluong')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>


    <div class="mb-3">
      <label for="gianhap" class="form-label">Giá nhập</label>
      <input name="gianhap" type="text" class="form-control @error('gianhap') is-invalid @enderror" id="gianhap" aria-describedby="gianhap" >
      @error('gianhap')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    
    </div>


    <div class="mb-3">
      <label for="giaxuat" class="form-label">Giá bán</label>
      <input name="giaxuat" type="text" class="form-control @error('giaxuat') is-invalid @enderror" id="giaxuat" aria-describedby="giaxuat" >
      @error('giaxuat')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>


    <div class="mb-3">
      <select name="nhanhieu_id" class="form-select" aria-label="Default select example">
        <option selected>chọn nhãn hiệu</option>
        @foreach ($nhanhieu as $item)
        <option value="{{$item->id}}">{{$item->nhanhieu}}</option>
        @endforeach 
      </select>

      <select name="xuatxu_id" class="form-select" aria-label="Default select example">
        <option selected>chọn xuất xứ</option>
        @foreach ($xuatxu as $item)
        <option value="{{$item->id}}">{{$item->xuatxu}}</option>
        @endforeach
      </select>
    
      <select name="baohanh_id" class="form-select" aria-label="Default select example">
        <option selected>chọn bảo hành</option>
        @foreach ($baohanh as $item)
        <option value="{{$item->id}}">{{$item->thoigianbaohanh}}</option>
        @endforeach
      </select>
    
      <select name="danhmuc_id" class="form-select" aria-label="Default select example">
        <option selected>chọn danh mục</option>
        @foreach ($danhmuc as $item)
        <option value="{{$item->id}}">{{$item->tendanhmuc}}</option>
        @endforeach
      </select>
    </div>

      <div>
      <label for="chitiet" class="form-label">Chi tiết sản phẩm</label>
      <textarea name="chitiet"type="text" class="form-control ckeditor" id="chitiet" aria-describedby="chitiet"></textarea>
      <div class="invalid-feedback"></div>
    </div>

    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>




@endsection