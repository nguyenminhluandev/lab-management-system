@extends('layouts.app')

@section('title', 'Dashboard - Manager')

@section('content')
    <div class="container">
        <h1>Xin chào, { Auth::user()->name } ({ Auth::user()->role->name })</h1>
        <p>Đây là giao diện dành cho Manager.</p>
        <ul>
            
<li><a href="{{ route('manager.repairs.index') }}">Xử lý sự cố máy tính</a></li>
<li><a href="{{ route('manager.materials.index') }}">Danh sách vật tư</a></li>

        </ul>
    </div>
@endsection
