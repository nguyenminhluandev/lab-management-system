@extends('layouts.app')
@section('title', 'Quản lý Học kỳ')

@section('content')
<h4>Danh sách học kỳ</h4>
<a href="{{ route('admin.semesters.create') }}" class="btn btn-success mb-3">➕ Thêm học kỳ</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tên</th><th>Năm học</th><th>Bắt đầu</th><th>Kết thúc</th><th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($semesters as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td>{{ $s->academic_year }}</td>
                <td>{{ $s->start_date }}</td>
                <td>{{ $s->end_date }}</td>
                <td>
                    <a href="{{ route('admin.semesters.edit', $s) }}" class="btn btn-sm btn-primary">Sửa</a>
                    <form action="{{ route('admin.semesters.destroy', $s) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Xác nhận xóa?')" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Không có học kỳ nào.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $semesters->links() }}
@endsection
