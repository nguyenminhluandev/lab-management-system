@extends('layouts.app')
@section('title', 'Chi tiết máy tính')
@section('content')

<h4>Thông tin máy tính</h4>
<table class="table table-bordered">
    <tr><th>Mã máy</th><td>{{ $computer->id }}</td></tr>
    <tr><th>Tên</th><td>{{ $computer->name }}</td></tr>
    <tr><th>Phòng máy</th><td>{{ $computer->lab->name ?? '-' }}</td></tr>
    <tr><th>CPU</th><td>{{ $computer->cpu }}</td></tr>
    <tr><th>RAM</th><td>{{ $computer->ram }}</td></tr>
    <tr><th>Lưu trữ</th><td>{{ $computer->storage }}</td></tr>
    <tr><th>Trạng thái</th><td>{{ $computer->status }}</td></tr>
</table>

<a href="{{ route('admin.computers.index') }}" class="btn btn-secondary">Quay lại</a>

@endsection
