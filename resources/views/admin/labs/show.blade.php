@extends('layouts.app')

@section('title', 'Chi tiết phòng máy')

@section('content')
    <h3>Chi tiết phòng máy</h3>

    <table class="table table-bordered">
        <tr>
            <th>Mã phòng</th>
            <td>{{ $lab->id }}</td>
        </tr>
        <tr>
            <th>Tên phòng</th>
            <td>{{ $lab->name }}</td>
        </tr>
        <tr>
            <th>Giáo viên phụ trách</th>
            <td>{{ $lab->manager->name ?? '-' }}</td>
        </tr>
        <tr>
        <th>Số lượng máy tính</th>
            <td>{{ $lab->computers->count() }}
                <a href="{{ route('admin.computers.byLab', $lab->id) }}" class="btn btn-sm btn-outline-primary ms-2">Xem chi tiết</a>
            </td>
        </tr>
        <tr>
            <th>Ngày tạo</th>
            <td>{{ $lab->created_at }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.labs.index') }}" class="btn btn-secondary">Quay lại</a>
@endsection
