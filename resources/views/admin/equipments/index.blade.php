@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Danh sách vật tư</h4>

    @include('flash::message')

    <a href="{{ route('admin.equipments.create') }}" class="btn btn-primary mb-3">+ Thêm vật tư</a>

    <form method="GET" action="{{ route('admin.equipments.index') }}" class="mb-3 row">
        <div class="col-md-4">
            <select name="lab_id" class="form-select">
                <option value="">-- Chọn phòng máy --</option>
                @foreach($labs as $lab)
                    <option value="{{ $lab->id }}" {{ request('lab_id') == $lab->id ? 'selected' : '' }}>
                        {{ $lab->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Lọc</button>
            <a href="{{ route('admin.equipments.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    @if($equipments->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Phòng máy</th>
                <th>Tên vật tư</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipments as $equipment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $equipment->lab_id }}</td>
                <td>{{ $equipment->name }}</td>
                <td>{{ $equipment->quantity }}</td>
                <td>
                    <span class="badge {{ $equipment->status == 'Hoạt động' ? 'bg-success' : 'bg-danger' }}">
                        {{ $equipment->status }}
                    </span>
                </td>
                <td>{{ $equipment->description }}</td>
                <td>
                    {{-- <a href="{{ route('admin.equipments.show', $equipment->id) }}" class="btn btn-sm btn-info">Xem</a> --}}
                    <a href="{{ route('admin.equipments.edit', $equipment->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <form action="{{ route('admin.equipments.destroy', $equipment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xác nhận xóa vật tư này?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $equipments->links() }}
    @else
        <div class="alert alert-info">Hiện chưa có vật tư nào trong hệ thống.</div>
    @endif
</div>
@endsection
