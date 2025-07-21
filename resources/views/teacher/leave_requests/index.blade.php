@extends('layouts.app')
@section('title', 'Yêu cầu nghỉ dạy')
@section('content')
<h3>📄 Danh sách yêu cầu nghỉ dạy</h3>
<a href="{{ route('teacher.leaverequests.create') }}" class="btn btn-primary mb-2">➕ Gửi yêu cầu mới</a>
<table class="table">
    <thead>
        <tr>
            <th>Môn học</th>
            <th>Lý do</th>
            <th>Ngày nghỉ</th>
            <th>Ngày dạy bù</th>
            <th>Trạng thái</th>
            <th>Phản hồi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($requests as $item)
            <tr>
                <td>{{ $item->schedule->subject->name }} - {{ $item->schedule->semester->name }} - {{ $item->schedule->semester->academic_year }}  </td>
                <td>{{ $item->reason }}</td>
                <td>{{ $item->leave_date }}</td>
                <td>{{ $item->makeup_date }}</td>
                {{-- <td>{{ $item->status }}</td> --}}
                <td>
                    @if($item->status == 'Chờ duyệt')
                        <span class="badge bg-warning">{{ $item->status }}</span>
                    @elseif($item->status == 'Đã duyệt')
                        <span class="badge bg-success">{{ $item->status }}</span>
                    @else
                        <span class="badge bg-danger">{{$item->status}}</span>
                    @endif
                </td>
                <td>
                    @if($item->status === 'Từ chối')
                        {{ $item->reason_rejection }}
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Không có yêu cầu nào.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
