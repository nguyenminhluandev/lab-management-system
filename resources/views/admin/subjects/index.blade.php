@extends('layouts.app')
@section('title', 'Quản lý Môn học')
@section('content')
<h4>Danh sách môn học</h4>
<a href="{{ route('admin.subjects.create') }}" class="btn btn-success mb-3">➕ Thêm môn học</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($subjects as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="{{ route('admin.subjects.show', $item->id) }}" class="btn btn-sm btn-info">Xem</a>
                    <a href="{{ route('admin.subjects.edit', $item->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                    <form method="POST" action="{{ route('admin.subjects.destroy', $item->id) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Xác nhận xóa?')" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3">Chưa có môn học nào.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $subjects->links() }}
@endsection
