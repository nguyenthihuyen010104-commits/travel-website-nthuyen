<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
</head>

<body>

    <h1>TRANG CHỦ</h1>

    <a href="{{ url('/login') }}">
        Đăng nhập
    </a>

    <br><br>

    <a href="{{ url('/register') }}">
        Đăng ký
    </a>

</body>

</html>
=======
@extends('layout')
@section('content')
<div class="text-center mb-4">
    <h2>Khám phá địa điểm du lịch</h2>
    <form action="/places/search" method="GET" class="d-flex justify-content-center mt-3">
        <input type="text" name="keyword" class="form-control w-50" placeholder="Tìm tên địa điểm...">
        <button type="submit" class="btn btn-primary ms-2">Tìm kiếm</button>
    </form>
</div>

<div class="row">
    @foreach($places ?? $featuredPlaces as $p)
    <div class="col-md-4 mb-3">
        <div class="card h-100 shadow-sm">
            @if($p->image)
            <img src="{{ asset('images/'.$p->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $p->name }}</h5>
                <p class="card-text text-truncate">{{ $p->description }}</p>
                <a href="/places/{{ $p->id }}" class="btn btn-outline-primary btn-sm w-100">Xem chi tiết</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
>>>>>>> 1cb7498bdf98f2dbb4544b765b52244309071c2b
