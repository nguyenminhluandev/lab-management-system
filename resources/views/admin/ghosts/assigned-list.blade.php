@extends('layouts.app')

@section('title', 'Danh sách ghost đã gán')

@section('content')
<div class="container">
    <a href="{{ route('admin.ghosts.index') }}" class="btn btn-secondary">Quay lại</a>
    <h2 class="mb-4">Ghost được gán cho các phòng máy</h2>

    <table class="table table-bordered">
        <thead>
            <tr >
                <th>Phòng máy</th>
                <th>Bộ ghost</th>
                <th>Ngày gán</th>
                <th>Kích hoạt</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($assignedGhosts as $item)
                <tr>
                    <td>{{ $item->lab->name ?? $item->lab_id }}</td>
                    <td>{{ $item->ghost->name ?? $item->ghost_id }}</td>
                    <td>{{ $item->assigned_at }}</td>
                    {{-- <td>{{ $item->is_active ? 'Đang sử dụng' : 'Không' }}</td> --}}
                    <td>
                          @if($item->is_active)
                                <span class="badge bg-success">Đang sử dụng</span>
                            @else
                                <span class="badge bg-secondary">Không</span>
                            @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="">Chưa có ghost nào được gán.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
