@extends('layouts.app')

@section('title', 'Bảng điều khiển - Quản trị viên')

@section('content')
    <div class="container">
        <h1 class="mb-4">👋 Chào mừng, {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->role->name) }})</h1>
        <p class="text-muted">Đây là bảng điều khiển dành cho quản trị viên hệ thống.</p>

        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            {{-- Người dùng --}}
            <div class="col">
                <div class="card h-100 border-primary">
                    <div class="card-body">
                        <h5 class="card-title">👤 Người dùng</h5>
                        <p class="card-text">Thêm, sửa, xoá và phân quyền người dùng.</p>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Quản lý</a>
                    </div>
                </div>
            </div>

            {{-- Vai trò --}}
            <div class="col">
                <div class="card h-100 border-secondary">
                    <div class="card-body">
                        <h5 class="card-title">🔑 Vai trò</h5>
                        <p class="card-text">Quản lý các vai trò trong hệ thống.</p>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Quản lý</a>
                    </div>
                </div>
            </div>

            {{-- Phòng máy --}}
            <div class="col">
                <div class="card h-100 border-success">
                    <div class="card-body">
                        <h5 class="card-title">💻 Phòng máy</h5>
                        <p class="card-text">Xem và cập nhật thông tin các phòng máy.</p>
                        <a href="{{ route('admin.labs.index') }}" class="btn btn-success">Quản lý</a>
                    </div>
                </div>
            </div>

            {{-- Máy tính --}}
            <div class="col">
                <div class="card h-100 border-info">
                    <div class="card-body">
                        <h5 class="card-title">🖥 Máy tính</h5>
                        <p class="card-text">Quản lý danh sách và cấu hình các máy tính.</p>
                        <a href="{{ route('admin.computers.index') }}" class="btn btn-info">Quản lý</a>
                    </div>
                </div>
            </div>

            {{-- Môn học --}}
            <div class="col">
                <div class="card h-100 border-warning">
                    <div class="card-body">
                        <h5 class="card-title">📚 Môn học</h5>
                        <p class="card-text">Thêm, sửa, xoá thông tin môn học.</p>
                        <a href="{{ route('admin.subjects.index') }}" class="btn btn-warning">Quản lý</a>
                    </div>
                </div>
            </div>

            {{-- Học kỳ --}}
            <div class="col">
                <div class="card h-100 border-warning">
                    <div class="card-body">
                        <h5 class="card-title">📆 Học kỳ</h5>
                        <p class="card-text">Thêm, sửa, xoá thông tin học kỳ.</p>
                        <a href="{{ route('admin.semesters.index') }}" class="btn btn-warning">Quản lý</a>
                    </div>
                </div>
            </div>

            {{-- Thời khóa biểu --}}
            <div class="col">
                <div class="card h-100 border-danger">
                    <div class="card-body">
                        <h5 class="card-title">📅 Thời khóa biểu</h5>
                        <p class="card-text">Tạo và cập nhật lịch giảng dạy.</p>
                        <a href="{{ route('admin.schedules.index') }}" class="btn btn-danger">Quản lý</a>
                    </div>
                </div>
            </div>

            {{-- Xem thời khóa biểu --}}
            <div class="col">
                <div class="card h-100 border-danger">
                    <div class="card-body">
                        <h5 class="card-title">📅 Xem thời khóa biểu theo tuần</h5>
                        <p class="card-text">Xem lịch giảng dạy.</p>
                        <a href="{{ route('admin.schedules.weekly') }}" class="btn btn-danger">Quản lý</a>
                    </div>
                </div>
            </div>

            {{-- Bộ Ghost --}}
            <div class="col">
                <div class="card h-100 border-dark">
                    <div class="card-body">
                        <h5 class="card-title">🧩 Bộ Ghost</h5>
                        <p class="card-text">Quản lý bộ ghost và gán vào phòng máy.</p>
                        <a href="{{ route('admin.ghosts.index') }}" class="btn btn-dark">Quản lý</a>
                    </div>
                </div>
            </div>

            {{-- Vật tư --}}
            <div class="col">
                <div class="card h-100 border-primary">
                    <div class="card-body">
                        <h5 class="card-title">🛠 Vật tư</h5>
                        <p class="card-text">Quản lý thiết bị, vật tư phòng máy.</p>
                        <a href="{{ route('admin.equipments.index') }}" class="btn btn-primary">Quản lý</a>
                    </div>
                </div>
            </div>

            {{-- Yêu cầu nghỉ --}}
            <div class="col">
                <div class="card h-100 border-secondary">
                    <div class="card-body">
                        <h5 class="card-title">📝 Báo nghỉ</h5>
                        <p class="card-text">Duyệt các yêu cầu nghỉ và dạy bù.</p>
                        <a href="{{ route('admin.leave_requests.index') }}" class="btn btn-secondary">Quản lý</a>
                    </div>
                </div>
            </div>

            {{-- Thống kê --}}
            <div class="col">
                <div class="card h-100 border-success">
                    <div class="card-body">
                        <h5 class="card-title">📊 Thống kê</h5>
                        <p class="card-text">Xem báo cáo về giờ dạy, phòng máy...</p>
                        <a href="{{ route('admin.statistics.index') }}" class="btn btn-success">Xem thống kê</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
