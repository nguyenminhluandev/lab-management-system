@extends('layouts.app')
@section('title', 'Quản lý Máy tính')
@section('content')

<h4>Danh sách máy tính</h4>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('admin.computers.create') }}" class="btn btn-success">➕ Thêm máy tính</a>

    <form method="GET" action="{{ route('admin.computers.index') }}" class="d-flex mb-3">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Nhập mã, tên hoặc phòng..."
            class="form-control form-control-sm w-50 me-2">
        <button type="submit" class="btn btn-sm btn-outline-primary">Tìm kiếm</button>
    </form>

</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Phòng máy</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($computers as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->lab->name ?? '-' }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('admin.computers.show', $item->id) }}" class="btn btn-sm btn-info">Xem</a>
                    <a href="{{ route('admin.computers.edit', $item->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                    <form method="POST" action="{{ route('admin.computers.destroy', $item->id) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Xác nhận xóa?')" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Không có máy tính nào.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $computers->appends(request()->query())->links() }}

@endsection
