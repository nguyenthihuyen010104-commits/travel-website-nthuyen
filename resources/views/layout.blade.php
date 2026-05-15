<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý Du lịch Mini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">🗺️ Travel Mini</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="/places">Danh sách địa điểm</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @if(session('isLogin'))
                    <li class="nav-item"><span class="nav-link text-warning">Chào, {{ session('name') }}</span></li>
                    @if(session('role') == 'admin')
                    <li class="nav-item"><a class="nav-link text-success" href="/admin/dashboard">Trang Admin</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="/logout">Đăng xuất</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="/login">Đăng nhập</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Đăng ký</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

        @yield('content')
    </div>
</body>

</html>