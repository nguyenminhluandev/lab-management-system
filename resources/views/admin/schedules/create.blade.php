@extends('layouts.app')

@section('title', 'Thêm thời khóa biểu')

@section('content')
<h4>Thêm Thời khóa biểu</h4>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@include('flash::message')

<form method="POST" action="{{ route('admin.schedules.store') }}">
    @csrf

    <div class="mb-3">
        <label>Phòng máy</label>
        <select name="lab_id" class="form-control" required>
            @foreach($labs as $lab)
                <option value="{{ $lab->id }}">{{ $lab->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Môn học</label>
        <select name="subject_id" class="form-control" required>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Giáo viên</label>
        <select name="teacher_id" class="form-control" required>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Học kỳ</label>
        <select name="semester_id" class="form-control" required>
            @foreach($semesters as $semester)
                <option value="{{ $semester->id }}">{{ $semester->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Thứ</label>
        <select name="day_of_week" class="form-control" required>
            @for ($i = 2; $i <= 8; $i++)
                <option value="{{ $i }}">Thứ {{ $i }}</option>
            @endfor
        </select>
    </div>

    <div class="mb-3">
        <label>Tiết bắt đầu</label>
        <input type="number" name="start_period" min="1" max="15" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Số tiết</label>
        <input type="number" name="total_periods" min="1" max="15" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection
