@extends('layout.admin')
@section('main')
<form action="{{route('nhanhieu.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nhanhieu" class="form-label">Tên nhãn hiệu</label>
      <input name="nhanhieu" type="text" class="form-control" id="nhanhieu" aria-describedby="nhanhieu" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection