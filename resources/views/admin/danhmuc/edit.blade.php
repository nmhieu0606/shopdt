@extends('layout.admin')
@section('main')
<form action="{{route('danhmuc.update', $data->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="tendanhmuc" class="form-label">Tên danh mục</label>
      <input value="{{$data->tendanhmuc}}" name="tendanhmuc" type="text" class="form-control" id="tendanhmuc" aria-describedby="tendanhmuc" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection