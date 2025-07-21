@extends('layouts.app')

@section('title', 'Thêm phòng máy')

@section('content')
    <h3>Thêm phòng máy</h3>

    <form method="POST" action="{{ route('admin.labs.store') }}">
        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">Mã phòng máy</label>
            <input type="text" name="id" class="form-control" value="{{ old('id') }}" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Tên phòng máy</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="manager_id" class="form-label">Giáo viên phụ trách</label>
            <select name="manager_id" class="form-select" required>
                <option value="">-- Chọn giáo viên --</option>
                @foreach($managers as $manager)
                    <option value="{{ $manager->id }}" {{ old('manager_id') == $manager->id ? 'selected' : '' }}>
                        {{ $manager->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('admin.labs.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
