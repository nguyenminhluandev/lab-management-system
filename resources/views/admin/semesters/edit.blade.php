@extends('layouts.app')

@section('title', 'Chỉnh sửa học kỳ')

@section('content')
    <h4>✏️ Chỉnh sửa học kỳ</h4>

    <form method="POST" action="{{ route('admin.semesters.update', $semester->id) }}" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Tên học kỳ</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $semester->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="academic_year" class="form-label">Năm học</label>
            <input type="text" class="form-control" name="academic_year" value="{{ old('academic_year', $semester->academic_year) }}" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Ngày bắt đầu</label>
            <input type="date" class="form-control" name="start_date" value="{{ old('start_date', $semester->start_date) }}" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Ngày kết thúc</label>
            <input type="date" class="form-control" name="end_date" value="{{ old('end_date', $semester->end_date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">💾 Cập nhật</button>
        <a href="{{ route('admin.semesters.index') }}" class="btn btn-secondary">↩️ Quay lại</a>
    </form>
@endsection
