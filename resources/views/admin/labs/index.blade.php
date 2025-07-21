{{-- @extends('layouts.app')

@section('title', 'Quản lý phòng máy')

@section('content')
    <h3>Danh sách phòng máy</h3>

    <a href="{{ route('admin.labs.create') }}" class="btn btn-success mb-3">➕ Thêm phòng máy</a>

    @if ($labs->isEmpty())
        <div class="alert alert-info">Không có phòng máy nào.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã phòng</th>
                    <th>Tên phòng</th>
                    <th>Giáo viên phụ trách</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($labs as $lab)
                    <tr>
                        <td>{{ $lab->id }}</td>
                        <td>{{ $lab->name }}</td>
                        <td>{{ $lab->manager->name ?? 'Chưa phân công' }}</td>
                        <td>
                            <a href="{{ route('admin.labs.show', $lab->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('admin.labs.edit', $lab->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('admin.labs.destroy', $lab->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa phòng máy này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection --}}
@extends('layouts.app')

@section('title', 'Quản lý phòng máy')

@section('content')
    <h3>Danh sách phòng máy</h3>

    <a href="{{ route('admin.labs.create') }}" class="btn btn-success mb-3">➕ Thêm phòng máy</a>

    @if ($labs->isEmpty())
        <div class="alert alert-info">Không có phòng máy nào.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã phòng</th>
                    <th>Tên phòng</th>
                    <th>Giáo viên phụ trách</th>
                    <th>Số lượng máy</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($labs as $lab)
                    <tr>
                        <td>{{ $lab->id }}</td>
                        <td>{{ $lab->name }}</td>
                        <td>{{ $lab->manager->name ?? 'Chưa phân công' }}</td>
                        <td>{{ $lab->computers_count }}</td>
                        <td>
                            <a href="{{ route('admin.labs.show', $lab->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('admin.computers.byLab', $lab->id) }}" class="btn btn-sm btn-primary">Xem máy tính</a>
                            <a href="{{ route('admin.labs.edit', $lab->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('admin.labs.destroy', $lab->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa phòng máy này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {!! $labs->links() !!}
            <!-- links() Tự động sinh nút "trang kế tiếp", "trang trước", "số trang" đk phân trang: $labs phải là biến được trả từ paginate() -->
        </div>
    @endif
@endsection
