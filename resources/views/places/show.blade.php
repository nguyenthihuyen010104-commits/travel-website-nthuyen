HTML
@extends('layout')
@section('content')
<div class="row bg-white p-4 rounded shadow-sm">
    <div class="col-md-6">
        @if($place->image)
        <img src="{{ asset('images/'.$place->image) }}" class="img-fluid rounded" alt="img">
        @else
        <div class="p-5 bg-secondary text-white text-center rounded">Chưa có ảnh</div>
        @endif
    </div>
    <div class="col-md-6">
        <h2 class="text-primary">{{ $place->name }}</h2>
        <p><strong>📍 Địa chỉ:</strong> {{ $place->address }}</p>
        <p><strong>Trạng thái:</strong> {{ $place->status == 1 ? 'Hoạt động' : 'Tạm đóng' }}</p>
        <hr>
        <h5>Mô tả:</h5>
        <p>{!! nl2br(e($place->description)) !!}</p>
        <a href="javascript:history.back()" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
</div>
@endsection