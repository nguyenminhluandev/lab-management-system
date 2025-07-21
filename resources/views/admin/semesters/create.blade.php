@extends('layouts.app')

@section('title', 'Thêm học kỳ')

@section('content')
    <h4>➕ Thêm học kỳ</h4>

    <form method="POST" action="{{ route('admin.semesters.store') }}" class="mt-3">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên học kỳ</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="academic_year" class="form-label">Năm học</label>
            <input type="text" class="form-control" name="academic_year" value="{{ old('academic_year') }}" placeholder="VD: 2024-2025" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Ngày bắt đầu</label>
            <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Ngày kết thúc</label>
            <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">💾 Lưu</button>
        <a href="{{ route('admin.semesters.index') }}" class="btn btn-secondary">↩️ Quay lại</a>
    </form>
@endsection
