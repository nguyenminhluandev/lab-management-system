@extends('layouts.app')

@section('title', 'Thông tin người dùng')

@section('content')
<h4>Thông tin người dùng</h4>

<table class="table table-bordered">
    <tr>
        <th>Mã</th><td>{{ $user->id }}</td>
    </tr>
    <tr>
        <th>Tên</th><td>{{ $user->name }}</td>
    </tr>
    <tr>
        <th>Email</th><td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>Vai trò</th><td>{{ $user->role->name ?? '-' }}</td>
    </tr>
    <tr>
        <th>Ngày tạo</th><td>{{ $user->created_at }}</td>
    </tr>
</table>

<a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>
