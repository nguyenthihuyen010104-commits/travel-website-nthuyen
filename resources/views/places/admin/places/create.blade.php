@extends('layout')
@section('content')
<h2>Thêm Địa Điểm Mới</h2>
<form action="/admin/places/store" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    <div class="mb-3">
        <label>Tên địa điểm</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Mô tả chi tiết</label>
        <textarea name="description" class="form-control" rows="4" required></textarea>
    </div>
    <div class="mb-3">
        <label>Địa chỉ</label>
        <input type="text" name="address" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Hình ảnh</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Lưu dữ liệu</button>
    <a href="/admin/places" class="btn btn-secondary">Hủy</a>
</form>
@endsection