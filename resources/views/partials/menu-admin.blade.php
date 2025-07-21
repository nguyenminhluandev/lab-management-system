<ul class="nav nav-pills mb-4 flex-wrap gap-2">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
           href="{{ route('admin.dashboard') }}">
            🏠 Trang chủ
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}"
           href="{{ route('admin.users.index') }}">
            👤 Người dùng
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/roles*') ? 'active' : '' }}"
           href="{{ route('admin.roles.index') }}">
            🔑 Vai trò
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/labs*') ? 'active' : '' }}"
           href="{{ route('admin.labs.index') }}">
            🖥 Phòng máy
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/computers*') ? 'active' : '' }}"
           href="{{ route('admin.computers.index') }}">
            💻 Máy tính
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/subjects*') ? 'active' : '' }}"
           href="{{ route('admin.subjects.index') }}">
            📚 Môn học
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/semesters*') ? 'active' : '' }}"
           href="{{ route('admin.semesters.index') }}">
            📆 Học kỳ
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/schedules*') ? 'active' : '' }}"
           href="{{ route('admin.schedules.index') }}">
            📅 Thời khóa biểu
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('') ? 'active' : '' }}"
           href="{{ route('admin.schedules.weekly') }}">
            📅 Xem Thời khóa biểu theo tuần
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/ghosts*') ? 'active' : '' }}"
           href="{{ route('admin.ghosts.index') }}">
            🧩 Bộ ghost
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/lab_ghosts*') ? 'active' : '' }}"
           href="{{ route('admin.lab_ghosts.index') }}">
            🖇 Gán ghost cho phòng
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/equipment*') ? 'active' : '' }}"
           href="{{ route('admin.equipments.index') }}">
            🛠 Vật tư
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/leaverequests*') ? 'active' : '' }}"
           href="{{ route('admin.leave_requests.index') }}">
            📝 Yêu cầu nghỉ
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/statistics*') ? 'active' : '' }}"
           href="{{ route('admin.statistics.index') }}">
            📊 Thống kê
        </a>
    </li>
</ul>
