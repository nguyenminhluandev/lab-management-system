@extends('layouts.app')
@section('title', 'Chi tiết Môn học')
@section('content')

<h4>Chi tiết Môn học</h4>

<table class="table table-bordered">
    <tr><th>Mã môn học</th><td>{{ $subject->id }}</td></tr>
    <tr><th>Tên môn học</th><td>{{ $subject->name }}</td></tr>
    <tr><th>Ngày tạo</th><td>{{ $subject->created_at }}</td></tr>
</table>

<a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">Quay lại</a>

@endsection
