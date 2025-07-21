@extends('layouts.app')
@section('title', 'Cập nhật máy tính')
@section('content')

<h4>Cập nhật máy tính</h4>
<form method="POST" action="{{ route('admin.computers.update', $computer->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Tên máy</label>
        <input type="text" name="name" class="form-control" value="{{ $computer->name }}" required>
    </div>
    <div class="mb-3">
        <label>Phòng máy</label>
        <select name="lab_id" class="form-select" required>
            @foreach ($labs as $id => $name)
                <option value="{{ $id }}" @selected($id == $computer->lab_id)>{{ $name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>CPU</label>
        <input type="text" name="cpu" class="form-control" value="{{ $computer->cpu }}">
    </div>
    <div class="mb-3">
        <label>RAM</label>
        <input type="text" name="ram" class="form-control" value="{{ $computer->ram }}">
    </div>
    <div class="mb-3">
        <label>Lưu trữ</label>
        <input type="text" name="storage" class="form-control" value="{{ $computer->storage }}">
    </div>
    <div class="mb-3">
        <label>Trạng thái</label>
        <select name="status" class="form-select" required>
            <option value="Hoạt động" @selected($computer->status == 'Hoạt động')>Hoạt động</option>
            <option value="Hỏng" @selected($computer->status == 'Hỏng')>Hỏng</option>
        </select>
    </div>
    <button class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('admin.computers.index') }}" class="btn btn-secondary">Hủy</a>
</form>

@endsection
