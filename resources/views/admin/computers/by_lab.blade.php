{{-- @extends('layouts.app')

@section('title', 'Danh sách máy tính trong ' . $lab->name)

@section('content')
    <h4>Máy tính trong phòng: <strong>{{ $lab->name }}</strong> ({{ $lab->id }})</h4>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Mã máy</th>
                <th>Tên máy</th>
                <th>Cấu hình</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lab->computers as $computer)
                <tr>
                    <td>{{ $computer->id }}</td>
                    <td>{{ $computer->name }}</td>
                    <td>{{ $computer->storage }}</td>
                    <td>{{ $computer->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Phòng này chưa có máy tính nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('admin.labs.index') }}" class="btn btn-secondary">← Quay lại danh sách phòng máy</a>
@endsection --}}
@extends('layouts.app')

@section('title', 'Máy tính của ' . $lab->name)

@section('content')
    <h4>Danh sách máy tính - {{ $lab->name }}</h4>

    <a href="{{ route('admin.labs.index') }}" class="btn btn-secondary mb-3">← Quay lại danh sách phòng máy</a>

    @if ($computers->isEmpty())
        <div class="alert alert-info">Phòng này chưa có máy tính nào.</div>
    @else
        <div class="row row-cols-1 row-cols-md-5 g-3">
            @foreach ($computers as $computer)
                <div class="col">
                    <div class="card h-100 shadow-sm border-{{ $computer->status === 'Hỏng' ? 'danger' : 'success' }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $computer->name }} ({{ $computer->id }})</h5>
                            <p class="card-text">
                                <strong>CPU:</strong> {{ $computer->cpu }}<br>
                                <strong>RAM:</strong> {{ $computer->ram }}<br>
                                <strong>Lưu trữ:</strong> {{ $computer->storage }}<br>
                                <strong>Trạng thái:</strong>
                                <span class="badge bg-{{ $computer->status === 'Hỏng' ? 'danger' : 'success' }}">
                                    {{ $computer->status }}
                                </span>
                            </p>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('admin.computers.show', $computer->id) }}" class="btn btn-sm btn-info">Chi tiết</a>
                            <a href="{{ route('admin.computers.edit', $computer->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('admin.computers.destroy', $computer->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Bạn có chắc muốn xóa máy tính này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
