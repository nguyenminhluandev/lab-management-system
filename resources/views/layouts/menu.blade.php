<li class="nav-item">
    <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Roles</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Users</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('labs.index') }}" class="nav-link {{ Request::is('labs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Labs</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.computers.index') }}" class="nav-link {{ Request::is('computers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Computers</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('issues.index') }}" class="nav-link {{ Request::is('issues*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Issues</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('issueComputers.index') }}"
        class="nav-link {{ Request::is('issueComputers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Issue Computers</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('equipment.index') }}" class="nav-link {{ Request::is('equipment*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Equipment</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('ghosts.index') }}" class="nav-link {{ Request::is('ghosts*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Ghosts</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('labGhosts.index') }}" class="nav-link {{ Request::is('labGhosts*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Lab Ghosts</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('subjects.index') }}" class="nav-link {{ Request::is('subjects*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Subjects</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('semesters.index') }}" class="nav-link {{ Request::is('semesters*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Semesters</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('schedules.index') }}" class="nav-link {{ Request::is('schedules*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Schedules</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('leaveRequests.index') }}" class="nav-link {{ Request::is('leaveRequests*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Leave Requests</p>
    </a>
</li>
