@extends('layout.admin')
@section('main')
<form action="{{route('xuatxu.update', $xuatxu->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="xuatxu" class="form-label">Tên xuất xứ</label>
      <input value="{{$xuatxu->xuatxu}}" name="xuatxu" type="text" class="form-control" id="xuatxu" aria-describedby="xuatxu">
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection