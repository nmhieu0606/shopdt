@extends('layout.admin')
@section('main')

<form action="{{route('xuatxu.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="xuatxu" class="form-label">Xuất xứ</label>
      <input name="xuatxu" type="text" class="form-control" id="xuatxu" aria-describedby="xuatxu" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection