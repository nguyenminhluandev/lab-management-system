@extends('layouts.app')

@section('title', 'Báo nghỉ - Dạy bù')

@section('content')
    <div class="container">
        <h2 class="mb-4">📝 Báo nghỉ - Đề xuất dạy bù</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('teacher.leaverequests.store') }}">
            @csrf

            {{-- Chọn lịch dạy --}}
            <div class="form-group mb-3">
                <label for="schedule_id">Lịch dạy:</label>
                <select name="schedule_id" id="schedule_id" class="form-control" required>
                    <option value="">-- Chọn lịch dạy --</option>
                    @foreach ($schedules as $schedule)
                        <option value="{{ $schedule->id }}" >
                            {{ $schedule->subject->name }} - {{ $schedule->lab->name }} - Thứ {{ $schedule->day_of_week }} ({{ $schedule->start_period }} - {{ $schedule->start_period + $schedule->total_periods - 1 }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Ngày nghỉ --}}
            <div class="form-group mb-3">
                <label for="leave_date">Ngày nghỉ:</label>
                <select name="leave_date" id="leave_date" class="form-control" required>
                    <option value="">-- Vui lòng chọn lịch dạy trước --</option>
                </select>
            </div>

            {{-- Ngày dạy bù --}}
            <div class="form-group mb-3">
                <label for="makeup_date">Ngày dạy bù (dự kiến):</label>
                <input type="date" name="makeup_date" id="makeup_date" class="form-control" value="{{ old('makeup_date') }}" required>
            </div>

            {{-- Checkbox xác nhận --}}
            <div class="form-group mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="force_makeup" id="force_makeup" value="1" {{ old('force_makeup') ? 'checked' : '' }}>
                    <label class="form-check-label" for="force_makeup">
                        Tôi xác nhận vẫn muốn dạy bù vào ngày này dù đã có lịch dạy khác
                    </label>
                </div>
            </div>

            {{-- Lý do --}}
            <div class="form-group mb-3">
                <label for="reason">Lý do nghỉ:</label>
                <textarea name="reason" class="form-control" rows="3" required>{{ old('reason') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">📤 Gửi yêu cầu</button>
            <a href="{{ route('teacher.leaverequests.index') }}" class="btn btn-secondary">⬅ Quay lại</a>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    const scheduleDates = @json($datesBySchedule);

    document.getElementById('schedule_id').addEventListener('change', function () {
        const selectedId = this.value;
        const leaveDateSelect = document.getElementById('leave_date');
        leaveDateSelect.innerHTML = '';

        if (!scheduleDates[selectedId] || scheduleDates[selectedId].length === 0) {
            leaveDateSelect.innerHTML = '<option value="">-- Không có ngày phù hợp --</option>';
            return;
        }

        scheduleDates[selectedId].forEach(function (date) {
            const option = document.createElement('option');
            option.value = date;
            option.text = date;
            leaveDateSelect.appendChild(option);
        });
    });
</script>
@endsection
