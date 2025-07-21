@extends('layouts.app')

@section('title', 'Cập nhật phòng máy')

@section('content')
    <h3>Cập nhật phòng máy</h3>

    <form method="POST" action="{{ route('admin.labs.update', $lab->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Mã phòng máy</label>
            <input type="text" name="id" class="form-control" value="{{ $lab->id }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Tên phòng máy</label>
            <input type="text" name="name" class="form-control" value="{{ $lab->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Giáo viên phụ trách</label>
            <select name="manager_id" class="form-select" required>
                @foreach($managers as $manager)
                    <option value="{{ $manager->id }}" {{ $lab->manager_id == $manager->id ? 'selected' : '' }}>
                        {{ $manager->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.labs.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection
