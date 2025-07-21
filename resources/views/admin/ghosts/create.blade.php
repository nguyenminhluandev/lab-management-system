@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{ route('admin.ghosts.index') }}" class="btn btn-secondary">Quay lại</a>
    <h3>Thêm bộ ghost</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.ghosts.store') }}">
        @csrf
        <div class="mb-3">
            <label>Mã Ghost</label>
            <input type="text" name="id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tên</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phiên bản</label>
            <input type="text" name="version" class="form-control">
        </div>
        <div class="mb-3">
            <label>Dung lượng</label>
            <input type="text" name="size" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Đường dẫn file ghost</label>
            <input type="text" name="file_path" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button class="btn btn-success">Thêm</button>
    </form>
</div>
@endsection
