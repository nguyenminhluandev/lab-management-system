@extends('layouts.app')

@section('title', 'Báo cáo sự cố')

@section('content')
<div class="container">

    <h3>🛠️ Báo cáo sự cố máy tính</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Lỗi!</strong> Vui lòng nhập đầy đủ thông tin:<br>
            <ul>
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('teacher.issues.store') }}">
        @csrf

        <div class="form-group">
            <label for="reported_date">⏰ Thời gian phát hiện</label>
            <input type="datetime-local" name="reported_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="computer_ids">🖥️ Máy tính bị lỗi</label>
            <select name="computer_ids[]" class="form-control" multiple required>
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}">{{ $computer->id }} - {{ $computer->name }} ({{ $computer->lab_id }})</option>
                @endforeach
            </select>
            <small>Giữ Ctrl (hoặc Cmd) để chọn nhiều máy</small>
        </div>

        <div class="form-group">
            <label for="description">📄 Mô tả chi tiết</label>
            <textarea name="description" class="form-control" rows="4" required placeholder="Ví dụ: Máy không lên nguồn, lỗi màn hình đen..."></textarea>
        </div>

        <button type="submit" class="btn btn-success">📤 Gửi báo cáo</button>
        <a href="{{ route('teacher.issues.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
