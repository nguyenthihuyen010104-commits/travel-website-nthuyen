@extends('layout')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            <a href="/admin/dashboard" class="list-group-item active">Bảng điều khiển</a>
            <a href="/admin/places" class="list-group-item">Quản lý địa điểm</a>
            <a href="/admin/users" class="list-group-item">Quản lý tài khoản</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header bg-dark text-white">Trang Quản Trị Hệ Thống</div>
            <div class="card-body">
                <h5>Chào mừng Admin!</h5>
                <p>Sử dụng menu bên trái để quản lý nội dung website.</p>
            </div>
        </div>
    </div>
</div>
@endsection