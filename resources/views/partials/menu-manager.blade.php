
<nav class="mb-3">
    <a href="{{ route('manager.dashboard') }}">🏠 Trang chủ</a> |
    <a href="{{ route('manager.repairs.index') }}">🛠 Sự cố máy</a> |
    <a href="{{ route('manager.materials.index') }}">📦 Vật tư</a> |
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">🚪 Đăng xuất</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
</nav>
