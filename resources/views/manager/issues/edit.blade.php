@extends('layouts.app')

@section('title', 'Cập nhật trạng thái sự cố')

@section('content')
<div class="container">
    <h2>🛠 Cập nhật trạng thái sự cố #{{ $issue->id }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('manager.issues.update', $issue->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Mô tả sự cố:</label>
            <p class="form-control">{{ $issue->description }}</p>
        </div>

        <div class="mb-3">
            <label>Trạng thái:</label>
            <select name="status" class="form-control" required>
                <option value="Chưa xử lý" {{ $issue->status == 'Chưa xử lý' ? 'selected' : '' }}>Chưa xử lý</option>
                <option value="Đã xử lý" {{ $issue->status == 'Đã xử lý' ? 'selected' : '' }}>Đã xử lý</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Ngày sửa chữa:</label>
            <input type="datetime-local" name="fixed_date" class="form-control"
                   value="{{ $issue->fixed_date ? \Carbon\Carbon::parse($issue->fixed_date)->format('Y-m-d\TH:i') : '' }}">
        </div>

        <div class="mb-3">
            <label>Người sửa chữa:</label>
            <input type="text" name="fixed_by" class="form-control" value="{{ old('fixed_by', $issue->fixed_by) }}">
        </div>

        <button type="submit" class="btn btn-success">💾 Cập nhật</button>
        <a href="{{ route('manager.issues.index') }}" class="btn btn-secondary">⬅ Quay lại</a>
    </form>
</div>
@endsection
