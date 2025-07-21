@extends('layouts.app')
@section('title', 'Thời khóa biểu theo Phòng máy')

@section('content')
<h4>Thời khóa biểu phòng {{ $lab->name }} ({{ $semester->name }})</h4>

<a href="{{ route('admin.schedules.byRoom') }}" class="btn btn-secondary mb-3">← Quay lại</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Môn học</th>
            <th>Giáo viên</th>
            <th>Học kỳ</th>
            <th>Thứ</th>
            <th>Tiết bắt đầu</th>
            <th>Số tiết</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($schedules as $item)
            <tr>
                <td>{{ $item->subject->name }}</td>
                <td>{{ $item->teacher->name }}</td>
                <td>{{ $item->semester->name }}</td>
                <td>Thứ {{ $item->day_of_week }}</td>
                <td>{{ $item->start_period }}</td>
                <td>{{ $item->total_periods }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Không có thời khóa biểu nào.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
