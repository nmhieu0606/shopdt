@extends('layout.admin')
@section('main')
<form action="{{route('danhmuc.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="tendanhmuc" class="form-label">Tên danh mục</label>
      <input name="tendanhmuc" type="text" class="form-control" id="tendanhmuc" aria-describedby="tendanhmuc" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection