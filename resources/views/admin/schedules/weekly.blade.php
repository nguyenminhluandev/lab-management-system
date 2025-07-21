@extends('layouts.app')
@section('title', 'Thời khóa biểu theo tuần')

@section('content')
<h4 class="mb-3">🗓 Thời khóa biểu theo tuần</h4>

<table class="table table-bordered text-center align-middle">
    <thead class="table-dark">
        <tr>
            <th>Tiết / Thứ</th>
            @for ($day = 2; $day <= 8; $day++)
                <th>Thứ {{ $day }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @for ($period = 1; $period <= 15; $period++)
            <tr>
                <th class="table-secondary">Tiết {{ $period }}</th>
                @for ($day = 2; $day <= 8; $day++)
                    @php
                        $items = $schedules[$day][$period] ?? [];
                    @endphp
                    <td style="min-width: 140px; max-width: 180px;">
                        @forelse ($items as $item)
                            <div class="bg-primary text-white rounded mb-1 p-1 small"
                                 style="cursor: pointer;"
                                 title="Môn: {{ $item->subject->name }}&#10;Phòng: {{ $item->lab->name }}&#10;GV: {{ $item->teacher->name }}&#10;Số tiết: {{ $item->total_periods }}">
                                {{ $item->subject->name }}
                            </div>
                        @empty
                            <span class="text-muted">—</span>
                        @endforelse
                    </td>
                @endfor
            </tr>
        @endfor
    </tbody>
</table>
@endsection
