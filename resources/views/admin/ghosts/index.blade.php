@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Danh sách bộ ghost</h3>
    <a href="{{ route('admin.ghosts.create') }}" class="btn btn-success mb-3">Thêm bộ ghost</a>
    <a href="{{ route('admin.ghosts.assignForm') }}" class="btn btn-success mb-3">Gán</a>
    <a href="{{ route('admin.ghosts.assignedList') }}" class="btn btn-success mb-3">DS bộ ghost</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tên</th>
                <th>Phiên bản</th>
                <th>Dung lượng</th>
                <th>Mô tả</th>
                <th>Đường dẫn</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ghosts as $ghost)
                <tr>
                    <td>{{ $ghost->id }}</td>
                    <td>{{ $ghost->name }}</td>
                    <td>{{ $ghost->version }}</td>
                    <td>{{ $ghost->size }}</td>
                    <td>{{ $ghost->description }}</td>
                    <td>{{ $ghost->file_path }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('admin.ghosts.edit', $ghost->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <form action="{{ route('admin.ghosts.destroy', $ghost->id) }}" method="POST" onsubmit="return confirm('Xác nhận xóa?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
