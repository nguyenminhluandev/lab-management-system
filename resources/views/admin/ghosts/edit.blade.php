@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Cập nhật bộ ghost</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.ghosts.update', $ghost->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Tên</label>
            <input type="text" name="name" class="form-control" value="{{ $ghost->name }}" required>
        </div>
        <div class="mb-3">
            <label>Phiên bản</label>
            <input type="text" name="version" class="form-control" value="{{ $ghost->version }}">
        </div>
        <div class="mb-3">
            <label>Dung lượng</label>
            <input type="text" name="size" class="form-control" value="{{ $ghost->size }}" required>
        </div>
        <div class="mb-3">
            <label>Đường dẫn file ghost</label>
            <input type="text" name="file_path" class="form-control" value="{{ $ghost->file_path }}" required>
        </div>
        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="description" class="form-control">{{ $ghost->description }}</textarea>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
