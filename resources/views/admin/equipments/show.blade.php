@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Chi tiết vật tư</h4>

    <div class="card">
        <div class="card-body">
            <p><strong>Phòng máy:</strong> {{ $equipment->lab_id }}</p>
            <p><strong>Tên vật tư:</strong> {{ $equipment->name }}</p>
            <p><strong>Số lượng:</strong> {{ $equipment->quantity }}</p>
            <p><strong>Trạng thái:</strong>
                <span class="badge {{ $equipment->status == 'Hoạt động' ? 'bg-success' : 'bg-danger' }}">
                    {{ $equipment->status }}
                </span>
            </p>
            <p><strong>Mô tả:</strong> {{ $equipment->description ?? '(Không có mô tả)' }}</p>
        </div>
    </div>

    <a href="{{ route('admin.equipments.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
</div>
@endsection
