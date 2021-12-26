<div style="width: 600px; margin: 0 auto;">
    <div style="text-align: center;">
        <h2>Xin chào {{$kh->hovaten}}</h2>
        <h3>Bạn đã đăng ký thành khoản tại shop của chúng tôi vui lòng kích hoạt tài khoản của bạn</h3>
        <p>
            <a href="{{route('home.kichhoat',['khachhang'=>$kh->id,'token'=>$kh->token])}}" style="display: inline-block;background-color: green;color:#fff;padding: 7px 25px; font-weight: bold">
                kích hoạt tài khoản
            </a>
        </p>
    </div>
</div>