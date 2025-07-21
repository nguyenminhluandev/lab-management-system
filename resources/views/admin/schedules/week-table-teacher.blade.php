@extends('layouts.app')
@section('title', 'Thời khóa biểu theo Giáo viên')

@section('content')
<h4>Thời khóa biểu của {{ $teacher->name }} ({{ $semester->name }})</h4>

<a href="{{ route('admin.schedules.byTeacher') }}" class="btn btn-secondary mb-3">← Quay lại</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Môn học</th>
            <th>Phòng máy</th>
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
                <td>{{ $item->lab->name }}</td>
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
