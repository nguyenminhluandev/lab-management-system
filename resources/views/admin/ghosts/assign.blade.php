@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Gán bộ ghost cho phòng máy</h3>
    <a href="{{ route('admin.ghosts.index') }}" class="btn btn-secondary">Quay lại</a>
    <form action="{{ route('admin.ghosts.assign') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="lab_id">Phòng máy:</label>
                <select name="lab_id" class="form-control" required>
                    <option value="">-- Chọn phòng máy --</option>
                    @foreach ($labs as $lab)
                        <option value="{{ $lab->id }}">{{ $lab->id }} - {{ $lab->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="ghost_id">Bộ ghost:</label>
                <select name="ghost_id" class="form-control" required>
                    <option value="">-- Chọn bộ ghost --</option>
                    @foreach ($ghosts as $ghost)
                        <option value="{{ $ghost->id }}">{{ $ghost->name }} ({{ $ghost->version }})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="is_active">Trạng thái Active:</label>
                <select name="is_active" class="form-control" required>
                    <option value="1">Có</option>
                    <option value="0">Không</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-success w-100">Gán ghost</button>
            </div>
        </div>
    </form>

    <h4 class="mt-4">Danh sách ghost đã gán</h4>
    @if($assignedGhosts->isEmpty())
        <p>Chưa có bộ ghost nào được gán.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Phòng máy</th>
                    <th>Bộ ghost</th>
                    <th>Phiên bản</th>
                    <th>Active</th>
                    <th>Ngày gán</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assignedGhosts as $assignment)
                    <tr>
                        <td>{{ $assignment->lab->id }} - {{ $assignment->lab->name }}</td>
                        <td>{{ $assignment->ghost->name }}</td>
                        <td>{{ $assignment->ghost->version }}</td>
                        <td>
                            @if($assignment->is_active)
                                <span class="badge bg-success">Đang active</span>
                            @else
                                <span class="badge bg-secondary">Không active</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($assignment->assigned_at)->format('d/m/Y H:i') }}</td>
                        <td class="d-flex gap-1">
                            @if($assignment->is_active)
                                <form action="{{ route('admin.ghosts.deactivate', [$assignment->lab_id, $assignment->ghost_id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-warning btn-sm">Hủy Active</button>
                                </form>
                            @else
                                <form action="{{ route('admin.ghosts.replaceActive') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="lab_id" value="{{ $assignment->lab_id }}">
                                    <input type="hidden" name="ghost_id" value="{{ $assignment->ghost_id }}">
                                    <button class="btn btn-primary btn-sm">Thay thế Active</button>
                                </form>
                            @endif
                            <form action="{{ route('admin.ghosts.unassign', [$assignment->lab_id, $assignment->ghost_id]) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn hủy gán ghost này?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hủy gán</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
