@extends('layout')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Quản lý địa điểm</h2>
    <a href="/admin/places/create" class="btn btn-success">Thêm mới +</a>
</div>

<table class="table table-bordered bg-white shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên địa điểm</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($places as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>
                @if($p->image)
                <img src="{{ asset('images/'.$p->image) }}" width="60" height="40" style="object-fit:cover;" alt="img">
                @else
                <span class="text-muted">Không có</span>
                @endif
            </td>
            <td>{{ $p->name }}</td>
            <td>
                @if($p->status == 1)
                <span class="badge bg-success">Hiển thị</span>
                @else
                <span class="badge bg-danger">Đang ẩn</span>
                @endif
            </td>
            <td>
                <a href="/admin/places/edit/{{ $p->id }}" class="btn btn-sm btn-warning">Sửa</a>
                <a href="/admin/places/delete/{{ $p->id }}" class="btn btn-sm btn-danger"
                    onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection