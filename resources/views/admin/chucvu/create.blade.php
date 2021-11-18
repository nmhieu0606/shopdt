@extends('layout.admin')
@section('main')
<form action="{{route('chucvu.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="tenchucvu" class="form-label">Tên chức vụ</label>
      <input name="tenchucvu" type="text" class="form-control @error('tenchucvu') is-invalid @enderror" id="tenchucvu" aria-describedby="tenchucvu" >
          @error('tenchucvu')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
    </div>
    <div class="mb-3">
        <label for="quyen" class="form-label">Quyền</label>
        <input name="quyen" type="text" class="form-control @error('quyen') is-invalid @enderror" id="quyen" aria-describedby="quyen" >
        @error('quyen')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
      </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection