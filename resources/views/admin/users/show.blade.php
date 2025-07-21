@extends('layouts.app')

@section('title', 'Thông tin người dùng')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">👤 Thông tin chi tiết người dùng</h5>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered mb-4">
                <tr>
                    <th scope="row" style="width: 25%">Mã người dùng</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Tên</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th scope="row">Vai trò</th>
                    <td>{{ $user->role->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">Ngày tạo</th>
                    <td>{{ $user->created_at}}</td>
                </tr>
            </table>

            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                Quay lại
            </a>
        </div>
    </div>
@endsection
