@extends('layouts.app')

@section('title', 'Quản lý yêu cầu báo nghỉ')

@section('content')
<h4>Danh sách yêu cầu báo nghỉ</h4>

@if($requests->count())
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Giáo viên</th>
            <th>Môn học</th>
            <th>Phòng</th>
            <th>Ngày nghỉ</th>
            <th>Ngày dạy bù</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($requests as $req)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $req->teacher->name ?? '' }}</td>
            <td>{{ $req->schedule->subject->name ?? '' }}</td>
            <td>{{ $req->schedule->lab->name ?? '' }}</td>
            <td>{{ $req->leave_date }}</td>
            <td>{{ $req->makeup_date }}</td>
            <td>
                @if($req->status == 'Chờ duyệt')
                    <span class="badge bg-warning">{{ $req->status }}</span>
                @elseif($req->status == 'Đã duyệt')
                    <span class="badge bg-success">{{ $req->status }}</span>
                @else
                    <span class="badge bg-danger">Từ chối</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.leave_requests.show', $req->id) }}" class="btn btn-primary btn-sm">Chi tiết</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $requests->links() }}

@else
<div class="alert alert-info">Hiện tại không có yêu cầu báo nghỉ nào.</div>
@endif
@endsection
