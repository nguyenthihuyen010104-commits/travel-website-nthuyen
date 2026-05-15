@extends('layout')
@section('content')
<h2>Sửa thông tin địa điểm</h2>
<form action="/admin/places/update/{{ $place->id }}" method="POST" enctype="multipart/form-data"
    class="bg-white p-4 rounded shadow-sm">
    @csrf
    <div class="mb-3">
        <label>Tên địa điểm</label>
        <input type="text" name="name" class="form-control" value="{{ $place->name }}" required>
    </div>
    <div class="mb-3">
        <label>Mô tả chi tiết</label>
        <textarea name="description" class="form-control" rows="4" required>{{ $place->description }}</textarea>
    </div>
    <div class="mb-3">
        <label>Địa chỉ</label>
        <input type="text" name="address" class="form-control" value="{{ $place->address }}" required>
    </div>
    <div class="mb-3">
        <label>Hình ảnh hiện tại</label><br>
        @if($place->image)
        <img src="{{ asset('images/'.$place->image) }}" width="150" class="mb-3 rounded" alt="current_img">
        @endif
        <input type="file" name="image" class="form-control">
        <small class="text-muted">Chỉ chọn file mới nếu bạn muốn thay đổi ảnh cũ.</small>
    </div>
    <div class="mb-3">
        <label>Trạng thái</label>
        <select name="status" class="form-control">
            <option value="1" {{ $place->status == 1 ? 'selected' : '' }}>Hiển thị</option>
            <option value="0" {{ $place->status == 0 ? 'selected' : '' }}>Ẩn</option>
        </select>
    </div>
    <button type="submit" class="btn btn-warning">Cập nhật dữ liệu</button>
    <a href="/admin/places" class="btn btn-secondary">Hủy</a>
</form>
@endsection