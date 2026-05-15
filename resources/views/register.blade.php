<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>

    <h1>ĐĂNG KÝ TÀI KHOẢN</h1>

    @if($errors->any())
    <div style="color:red">
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">

        @csrf

        <div>
            Họ tên
        </div>

        <input type="text" name="name" value="{{ old('name') }}">

        <br><br>

        <div>
            Username
        </div>

        <input type="text" name="username" value="{{ old('username') }}">

        <br><br>

        <div>Email</div>
        <input type="email" name="email" value="{{ old('email') }}">
        <br><br>

        <div>
            Password
        </div>

        <input type="password" name="password">

        <br><br>

        <div>Confirm Password</div>
        <input type="password" name="confirm_password">
        <br><br>


        <button type="submit">
            Register
        </button>

    </form>

    <br>

    <a href="{{ url('/login') }}">
        Đã có tài khoản? Đăng nhập
    </a>

</body>

</html>
=======
@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white text-center">
                <h4>Đăng Ký Tài Khoản</h4>
            </div>
            <div class="card-body">
                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Họ và tên</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control" required>
                        @error('username') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                        @error('confirm_password') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-success w-100">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
>>>>>>> 1cb7498bdf98f2dbb4544b765b52244309071c2b
