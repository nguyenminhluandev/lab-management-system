@extends('layouts.app')
@section('title', 'Thêm máy tính')
@section('content')

<h4>Thêm máy tính mới</h4>
<form method="POST" action="{{ route('admin.computers.store') }}">
    @csrf
    <div class="mb-3">
        <label>Mã máy tính</label>
        <input type="text" name="id" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tên máy</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Phòng máy</label>
        <select name="lab_id" class="form-select" required>
            @foreach ($labs as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>CPU</label>
        <input type="text" name="cpu" class="form-control">
    </div>
    <div class="mb-3">
        <label>RAM</label>
        <input type="text" name="ram" class="form-control">
    </div>
    <div class="mb-3">
        <label>Lưu trữ</label>
        <input type="text" name="storage" class="form-control">
    </div>
    <div class="mb-3">
        <label>Trạng thái</label>
        <select name="status" class="form-select" required>
            <option value="Hoạt động">Hoạt động</option>
            <option value="Hỏng">Hỏng</option>
        </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
    <a href="{{ route('admin.computers.index') }}" class="btn btn-secondary">Hủy</a>
</form>

@endsection
