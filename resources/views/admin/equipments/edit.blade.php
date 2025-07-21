@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Cập nhật vật tư</h4>

    <form method="POST" action="{{ route('admin.equipments.update', $equipment->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Phòng máy</label>
            <select name="lab_id" class="form-control" required>
                @foreach($labs as $lab)
                    <option value="{{ $lab->id }}" {{ $equipment->lab_id == $lab->id ? 'selected' : '' }}>{{ $lab->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tên vật tư</label>
            <input type="text" name="name" class="form-control" required value="{{ $equipment->name }}">
        </div>

        <div class="mb-3">
            <label>Số lượng</label>
            <input type="number" name="quantity" class="form-control" min="1" required value="{{ $equipment->quantity }}">
        </div>

        <div class="mb-3">
            <label>Trạng thái</label>
            <select name="status" class="form-control" required>
                <option value="Hoạt động" {{ $equipment->status == 'Hoạt động' ? 'selected' : '' }}>Hoạt động</option>
                <option value="Hỏng" {{ $equipment->status == 'Hỏng' ? 'selected' : '' }}>Hỏng</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="description" class="form-control" rows="3">{{ $equipment->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.equipments.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
