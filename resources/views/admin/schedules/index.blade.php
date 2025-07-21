@extends('layouts.app')
@section('title', 'Quản lý Thời khóa biểu')

@php
    use App\Helpers\PeriodHelper;
@endphp

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Danh sách thời khóa biểu</h4>
    <a href="{{ route('admin.schedules.byRoom') }}" class="btn btn-success"> Room</a>
    <a href="{{ route('admin.schedules.byTeacher') }}" class="btn btn-success"> GV</a>
    <a href="{{ route('admin.schedules.create') }}" class="btn btn-success">➕ Thêm thời khóa biểu</a>
</div>

@if ($schedules->isEmpty())
    <div class="alert alert-info">Chưa có thời khóa biểu nào.</div>
@else
<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th>Môn học</th>
            <th>Giáo viên</th>
            <th>Phòng máy</th>
            <th>Học kỳ</th>
            <th>Thứ</th>
            <th>Tiết</th>
            <th>Giờ</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($schedules as $schedule)
            @php
                [$startTime, $endTime] = PeriodHelper::getTimeRange($schedule->start_period, $schedule->total_periods);
                $thu = $schedule->day_of_week == 8 ? 'Chủ Nhật' : 'Thứ ' . $schedule->day_of_week;
                $endPeriod = $schedule->start_period + $schedule->total_periods - 1;
            @endphp
            <tr>
                <td>{{ $schedule->subject->name ?? '-' }}</td>
                <td>{{ $schedule->teacher->name ?? '-' }}</td>
                <td>{{ $schedule->lab->name ?? '-' }}</td>
                <td>{{ $schedule->semester->name ?? '-' }}</td>
                <td>{{ $thu }}</td>
                <td>Tiết {{ $schedule->start_period }} - {{ $endPeriod }}</td>
                <td>{{ $startTime }} - {{ $endTime }}</td>
                <td>
                    <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                    <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận xoá?')">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $schedules->links() }}
@endif
@endsection
