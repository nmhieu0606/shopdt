@extends('layout.admin')
@section('main')
<form action="{{route('tinhtrang.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="tinhtrang" class="form-label">Tình trạng</label>
      <input name="tinhtrang" type="text" class="form-control" id="tinhtrang" aria-describedby="tinhtrang" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection