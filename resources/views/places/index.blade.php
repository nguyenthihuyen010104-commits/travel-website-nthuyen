@extends('layout')
@section('content')
<div class="mb-4">
    <h2>{{ isset($keyword) ? 'Kết quả tìm kiếm cho: "' . $keyword . '"' : 'Tất cả địa điểm du lịch' }}</h2>
</div>

<div class="row">
    @forelse($places as $p)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            @if($p->image)
            <img src="{{ asset('images/'.$p->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;"
                alt="{{ $p->name }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $p->name }}</h5>
                <p class="card-text text-truncate">{{ $p->description }}</p>
                <a href="/places/{{ $p->id }}" class="btn btn-outline-primary btn-sm w-100">Xem chi tiết</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info">Không tìm thấy địa điểm nào.</div>
    </div>
    @endforelse
</div>
@endsection