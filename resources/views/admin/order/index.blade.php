@extends('layout.admin');
@section('main')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên khách hàng</th>
        <th scope="col">Tên nhân viên</th>
        <th scope="col">Tình trạng đơn</th>
        <th scope="col">Tổng tiền</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($od as $item)   
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->khachhang->hovaten}}</td>
        @if (isset($item->nhanvien_id))
        <td>{{$item->nhanvien->hovaten}}</td>
        @else
        <td>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Chọn nhân viên
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @foreach ($nv as $n)
                    <li><a class="dropdown-item" href="{{route('order.update',['id'=>$item->id,'nv'=>$n->id])}}">{{$n->hovaten}}</a></li>
                    @endforeach
                </ul>
            </div>
           

        </td>
        @endif
        <td>{{$item->tinhtrang->tinhtrang}}</td>
        <td>{{number_Format($item->tongtien)}}</td>
        <td><a href="{{route('order.orderdetail',$item->id)}}" class="btn btn-primary">Xem</a></td>
        <td><a onclick="return confirm('Bạn có muốn xóa đơn hàng'.{{$item->id}}.' không')" href="{{route('order.delete',$item->id)}}" class="btn btn-primary">Xóa</a></td>
      </tr>
      <tr>
        @endforeach
    </tbody>
  </table>

@endsection