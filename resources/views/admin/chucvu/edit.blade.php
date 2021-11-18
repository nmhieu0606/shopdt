@extends('layout.admin')
@section('main')
<form action="{{route('chucvu.update', $chucvu->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="tenchucvu" class="form-label">Tên chức vụ</label>
      <input value="{{$chucvu->tenchucvu}}" name="tenchucvu" type="text" class="form-control @error('tenchucvu') is-invalid @enderror" id="tenchucvu" aria-describedby="tenchucvu">
    </div>
    <div class="mb-3">
        <label for="quyen" class="form-label">Quyền</label>
        <input value="{{$chucvu->quyen}}" name="quyen" type="text" class="form-control @error('quyen') is-invalid @enderror" id="quyen" aria-describedby="quyen">
      </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection