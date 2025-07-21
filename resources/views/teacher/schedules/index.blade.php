@extends('layouts.app')

@section('title', 'Thời khóa biểu')

@section('content')

    <div class="container">
        <h3 class="mb-4">📅 Thời khóa biểu giảng dạy</h3>
        <p>( Lưu ý: Mỗi ký tự trong dãy tuần 1234567890 đại diện cho 1 tuần lễ, ký tự đầu tiên diễn tả tuần thứ nhất của học kỳ (tuần 1) bắt đầu từ ngày 23/06/2025) <br/>
            - Tiết 01 (07h00 - 07h50); Tiết 02 (07h50 - 08h40); Tiết 03 (08h40 - 09h30);<br/>
            - Tiết 04 (09h35 - 10h25); Tiết 05 (10h25 - 11h15); Tiết 06 (11h15 - 12h05);<br/>
            - Tiết 07 (12h35 - 13h25); Tiết 08 (13h25 - 14h15); Tiết 09 (14h15 - 15h05);<br/>
            - Tiết 10 (15h10 - 16h00); Tiết 11 (16h00 - 16h50); Tiết 12 (16h50 - 17h40);<br/>
            - Tiết 13 (17h45 - 18h35); Tiết 14 (18h35 - 19h25); Tiết 15 (19h25 - 20h15). ...</p>
        <form method="GET" class="mb-3 row">
            <div class="col-md-6">
                <label for="semester_id">Chọn học kỳ:</label>
                <select name="semester_id" class="form-control" onchange="this.form.submit()">
                    @foreach($semesters as $semester)
                        <option value="{{ $semester->id }}" {{ $semester->id == $selectedSemesterId ? 'selected' : '' }}>
                            {{ $semester->name }} ({{ $semester->start_date }} → {{ $semester->end_date }})
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        @if($schedules->isEmpty())
            <div class="alert alert-warning mt-3">⛔ Không có thời khóa biểu nào.</div>
        @else
            <table class="table table-bordered table-striped mt-3">
                <thead class="table-light">
                    <tr>
                        <th>Thứ</th>
                        <th>Môn học</th>
                        <th>Phòng máy</th>
                        <th>Tiết bắt đầu</th>
                        <th>Số tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td>Thứ {{ $schedule->day_of_week }}</td>
                            <td>{{ $schedule->subject->name ?? '---' }}</td>
                            <td>{{ $schedule->lab->name ?? '---' }}</td>
                            <td>{{ $schedule->start_period }}</td>
                            <td>{{ $schedule->total_periods }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
