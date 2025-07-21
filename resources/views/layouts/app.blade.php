<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Quản lý phòng máy')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand { font-weight: bold; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="#">Quản lý phòng máy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
        @auth
            <span class="navbar-text text-white me-3">
                Xin chào, {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->role->name) }})
            </span>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="btn btn-sm btn-outline-light">Đăng xuất</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light">Đăng nhập</a>
        @endauth
    </div>
</nav>

<div class="container mt-4">
    {{-- Menu theo vai trò --}}
    @auth
        @php $role = Auth::user()->role->name; @endphp

        @if ($role === 'admin')
            @include('partials.menu-admin')
        @elseif ($role === 'manager')
            @include('partials.menu-manager')
        @elseif ($role === 'teacher')
            @include('partials.menu-teacher')
        @endif
    @endauth

    {{-- Flash message --}}
    @include('flash::message')

    {{-- Nội dung trang --}}
    @yield('content')
</div>

<footer class="text-center py-3 mt-4 text-muted small">
    © {{ date('Y') }} Hệ thống quản lý phòng máy - Đại học CNTT
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
