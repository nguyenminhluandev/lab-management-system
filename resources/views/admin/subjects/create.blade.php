@extends('layouts.app')
@section('title', 'Thêm Môn học')
@section('content')

<h4>Thêm Môn học</h4>

<form method="POST" action="{{ route('admin.subjects.store') }}">
    @csrf

    <div class="mb-3">
        <label for="id" class="form-label">Mã môn học</label>
        <input type="text" name="id" class="form-control" required value="{{ old('id') }}">
        @error('id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Tên môn học</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">Hủy</a>
</form>

@endsection
