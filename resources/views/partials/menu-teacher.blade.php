<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3 p-3 shadow rounded">
    <div class="container-fluid">
        <span class="navbar-brand">👨‍🏫 Giáo viên: {{ Auth::user()->name }}</span>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item px-2">
                    <a class="nav-link" href="{{ route('teacher.dashboard') }}">🏠 Trang chủ</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="{{ route('teacher.schedules.index') }}">📅 Thời khóa biểu</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="{{ route('teacher.issues.index') }}">❗ Báo sự cố</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="{{ route('teacher.leaverequests.index') }}">📝 Báo nghỉ / Dạy bù</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">🚪 Đăng xuất</a>
                </li>
            </ul>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</nav>
