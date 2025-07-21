@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Kết quả thống kê giờ dạy giáo viên</h4>
    <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    <form action="{{ route('admin.statistics.teacher.export') }}" method="GET" class="d-inline">
        <input type="hidden" name="semester_id" value="{{ request('semester_id') }}">
        <input type="hidden" name="teacher_id" value="{{ request('teacher_id') }}">
        <button type="submit" class="btn btn-success">Xuất Excel</button>
    </form>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Giáo viên</th>
                <th>Tổng số tiết</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $row)
                <tr>
                    <td>{{ $row->teacher->name }}</td>
                    <td>{{ $row->total_periods }}</td>
                </tr>
            @empty
                <tr><td colspan="2">Không có dữ liệu</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Biểu đồ --}}
<hr>
<h5 class="mt-4">Biểu đồ thống kê</h5>

<canvas id="chart" height="100" class="mt-4"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($data->map(fn($d) => $d->teacher->name)) !!},
            datasets: [{
                label: 'Tổng số tiết dạy',
                data: {!! json_encode($data->map(fn($d) => $d->total_periods)) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>

@endsection
