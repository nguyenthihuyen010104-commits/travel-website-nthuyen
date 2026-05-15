@extends('layout')
@section('content')
<h2 class="mb-3">Danh sách tài khoản hệ thống</h2>

<table class="table table-bordered bg-white shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Họ và tên</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Vai trò</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
        <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->username }}</td>
            <td>{{ $u->email }}</td>
            <td>
                @if($u->role == 'admin')
                <span class="badge bg-danger">Admin</span>
                @else
                <span class="badge bg-primary">User</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection