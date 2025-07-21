@extends('layouts.app')

@section('title', 'Dashboard - Giáo viên')

@section('content')
    <div class="container">
        <div class="alert alert-info">
            <h4>Xin chào, {{ Auth::user()->name }} 👋</h4>
            <p>Chào mừng bạn đến giao diện dành cho giáo viên.</p>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <a href="{{ route('teacher.schedules.index') }}" class="btn btn-primary w-100">📅 Thời khóa biểu</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('teacher.issues.index') }}" class="btn btn-warning w-100">❗ Báo cáo sự cố</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('teacher.leaverequests.index') }}" class="btn btn-success w-100">📝 Báo nghỉ / Dạy bù</a>
            </div>
        </div>
    </div>
@endsection
