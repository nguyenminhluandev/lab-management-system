@extends('layouts.app')

@section('title', 'Quản lý người dùng')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Danh sách người dùng</h4>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Thêm mới</a>
</div>

<form method="GET" action="{{ route('admin.users.index') }}" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Tìm theo mã hoặc tên..." value="{{ $search ?? '' }}">
        <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
    </div>
</form>

@include('flash::message')

@include('admin.users.table', ['users' => $users])
@endsection
