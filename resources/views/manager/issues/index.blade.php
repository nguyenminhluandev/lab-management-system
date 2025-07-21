@extends('layouts.app')

@section('title', 'Quản lý sự cố máy tính')

@section('content')
<div class="container">
    <h2>🛠 Danh sách sự cố trong phòng máy bạn phụ trách</h2>

    <a href="{{ route('manager.issues.search') }}" class="btn btn-outline-primary mb-3">🔍 Tra cứu sự cố</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã sự cố</th>
                <th>Máy tính</th>
                <th>Phòng</th>
                <th>Ngày báo cáo</th>
                <th>Người báo</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($issues as $issue)
                <tr>
                    <td>#{{ $issue->id }}</td>
                    <td>
                        @foreach($issue->computers as $comp)
                            <div>{{ $comp->id }}</div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($issue->computers as $comp)
                            <div>{{ $comp->lab->name ?? '-' }}</div>
                        @endforeach
                    </td>
                    <td>{{ $issue->reported_date }}</td>
                    <td>{{ $issue->reporter->name ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $issue->status == 'Đã xử lý' ? 'success' : 'warning' }}">
                            {{ $issue->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('manager.issues.edit', $issue->id) }}" class="btn btn-sm btn-primary">✏ Cập nhật</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Không có sự cố nào.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
