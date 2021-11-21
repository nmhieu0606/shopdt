@extends('layout.admin')
@section('main')
<form action="{{route('nhanhieu.update', $data->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="nhanhieu" class="form-label">Tên nhãn hiệu</label>
      <input value="{{$data->nhanhieu}}" name="nhanhieu" type="text" class="form-control" id="nhanhieu" aria-describedby="nhanhieu">
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection