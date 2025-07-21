@extends('layouts.app')

@section('title', 'Cập nhật thời khóa biểu')

@section('content')
<h4>Cập nhật Thời khóa biểu</h4>

<form method="POST" action="{{ route('admin.schedules.update', $schedule->id) }}">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Phòng máy</label>
        <select name="lab_id" class="form-control" required>
            @foreach($labs as $lab)
                <option value="{{ $lab->id }}" {{ $lab->id == $schedule->lab_id ? 'selected' : '' }}>
                    {{ $lab->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Môn học</label>
        <select name="subject_id" class="form-control" required>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $subject->id == $schedule->subject_id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Giáo viên</label>
        <select name="teacher_id" class="form-control" required>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ $teacher->id == $schedule->teacher_id ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Học kỳ</label>
        <select name="semester_id" class="form-control" required>
            @foreach($semesters as $semester)
                <option value="{{ $semester->id }}" {{ $semester->id == $schedule->semester_id ? 'selected' : '' }}>
                    {{ $semester->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Thứ</label>
        <select name="day_of_week" class="form-control" required>
            @for ($i = 2; $i <= 8; $i++)
                <option value="{{ $i }}" {{ $i == $schedule->day_of_week ? 'selected' : '' }}>
                    Thứ {{ $i }}
                </option>
            @endfor
        </select>
    </div>

    <div class="mb-3">
        <label>Tiết bắt đầu</label>
        <input type="number" name="start_period" min="1" max="15" value="{{ $schedule->start_period }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Số tiết</label>
        <input type="number" name="total_periods" min="1" max="15" value="{{ $schedule->total_periods }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection
