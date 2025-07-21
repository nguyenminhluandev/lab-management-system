@extends('layouts.app')
@section('title', 'Cập nhật Môn học')
@section('content')

<h4>Cập nhật Môn học</h4>

<form method="POST" action="{{ route('admin.subjects.update', $subject->id) }}">
    @csrf @method('PUT')

    <div class="mb-3">
        <label for="id" class="form-label">Mã môn học</label>
        <input type="text" name="id" class="form-control" required value="{{ old('id', $subject->id) }}">
        @error('id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Tên môn học</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name', $subject->name) }}">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">Hủy</a>
</form>

@endsection
