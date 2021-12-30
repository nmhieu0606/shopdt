@extends('layout.admin')

@section('main')

    <form action="{{ route('sanpham.update', $sp->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="tensp" class="form-label">Tên sản phẩm</label>
            <input type="text" value="{{ $sp->tensp }}" class="form-control @error('tensp') is-invalid @enderror"
                id="tensp" name="tensp">
            @error('tensp')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="form-group">
            <div class="mb-3">
                <label for="file" class="form-label">Ảnh</label>
                <img class="d-block" src="{{url('storage/hinhanh')}}/{{$sp->anh}}" width="50px"/>
                <input name="file" type="file" class="form-control" id="file" aria-describedby="file">
            </div>
        </div>


        <div class="mb-3">
            <label for="soluong" class="form-label">Số lượng</label>
            <input type="text" value="{{ $sp->soluong }}" class="form-control @error('soluong') is-invalid @enderror"
                id="soluong" name="soluong">
            @error('soluong')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="gianhap" class="form-label">Gía nhập</label>
            <input type="text" value="{{ $sp->gianhap }}" class="form-control @error('gianhap') is-invalid @enderror"
                id="gianhap" name="gianhap">
            @error('gianhap')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="giaxuat" class="form-label">Gía xuất</label>
            <input type="text" value="{{ $sp->giaxuat }}" class="form-control @error('giaxuat') is-invalid @enderror"
                id="giaxuat" name="giaxuat">
            @error('giaxuat')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nhanhieu_id">Nhãn hiệu<span class="text-danger font-weight-bold">*</span></label>
            <select id="nhanhieu_id" class="form-control custom-select @error('nhanhieu_id') is-invalid @enderror"
                name="nhanhieu_id" required autofocus>
                <option value="">--Chọn nhãn hiệu--</option>
                @foreach ($nh as $value)
                    <option value="{{ $value->id }}" {{ $sp->nhanhieu_id == $value->id ? 'selected' : '' }}>
                        {{ $value->nhanhieu }}</option>
                @endforeach
            </select>
            @error('nhanhieu_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="xuatxu_id">Xuất xứ<span class="text-danger font-weight-bold">*</span></label>
            <select id="xuatxu_id" class="form-control custom-select @error('xuatxu_id') is-invalid @enderror"
                name="xuatxu_id" required autofocus>
                <option value="">--Chọn nơi sản xuất--</option>
                @foreach ($xx as $value)
                    <option value="{{ $value->id }}" {{ $sp->xuatxu_id == $value->id ? 'selected' : '' }}>
                        {{ $value->xuatxu }}</option>
                @endforeach
            </select>
            @error('xuatxu_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>



        <div class="mb-3">
            <label for="baohanh_id">Bảo hành<span class="text-danger font-weight-bold">*</span></label>
            <select id="baohanh_id" class="form-control custom-select @error('baohanh_id') is-invalid @enderror"
                name="baohanh_id" required autofocus>
                <option value="">--Chọn thời gian bảo hành--</option>
                @foreach ($bh as $value)
                    <option value="{{ $value->id }}" {{ $sp->baohanh_id == $value->id ? 'selected' : '' }}>
                        {{ $value->thoigianbaohanh }}</option>
                @endforeach
            </select>
            @error('xuatxu_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="danhmuc_id">Danh mục<span class="text-danger font-weight-bold">*</span></label>
            <select id="danhmuc_id" class="form-control custom-select @error('danhmuc_id') is-invalid @enderror"
                name="danhmuc_id" required autofocus>
                <option value="">--Chọn danh mục sản phẩm--</option>
                @foreach ($dm as $value)
                    <option value="{{ $value->id }}" {{ $sp->danhmuc_id == $value->id ? 'selected' : '' }}>
                        {{ $value->tendanhmuc }}</option>
                @endforeach
            </select>
            @error('danhmuc_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="chitiet" class="form-label">Chi tiết</label>
            <textarea class="form-control ckeditor" name="chitiet" id="chitiet" cols="10"
                rows="1">{{ $sp->chitiet }}</textarea>
            <div class="invalid-feedback"></div>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật sản phẩm</button>
    </form>

@endsection
