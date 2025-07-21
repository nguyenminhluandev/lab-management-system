@extends('layouts.app')

@section('title', 'Dashboard - Manager')

@section('content')
    <div class="container">
        <h1>Xin chào, Giáo viên phụ trách {{ Auth::user()->name }} </h1>
        <p>Đây là giao diện dành cho Manager.</p>
        <ul>
            <li><a href="{{ route('manager.issues.index') }}">Quản lý sự cố</a></li>
            <li><a href="{{ route('manager.equipments.index') }}">Danh sách vật tư</a></li>
        </ul>
    </div>
@endsection
