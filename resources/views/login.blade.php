<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <h1>ĐĂNG NHẬP</h1>

    @if(session('success'))
    <p style="color:green">
        {{ session('success') }}
    </p>
    @endif

    @if(session('error'))
    <p style="color:red">
        {{ session('error') }}
    </p>
    @endif

    <form method="POST" action="{{ url('/login') }}">

        @csrf

        <div>
            Username
        </div>

        <input type="text" name="username">

        <br><br>

        <div>
            Password
        </div>

        <input type="password" name="password">

        <br><br>

        <button type="submit">
            Login
        </button>

    </form>

    <br>

    <a href="{{ url('/register') }}">
        Chưa có tài khoản? Đăng ký
    </a>

</body>

</html>
=======
@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                <h4>Đăng Nhập</h4>
            </div>
            <div class="card-body">
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
>>>>>>> 1cb7498bdf98f2dbb4544b765b52244309071c2b
