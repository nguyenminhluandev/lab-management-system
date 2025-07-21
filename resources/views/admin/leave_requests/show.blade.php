@extends('layouts.app')

@section('title', 'Chi tiết yêu cầu báo nghỉ')

@section('content')
<h4>Chi tiết yêu cầu báo nghỉ</h4>

<table class="table table-bordered">
    <tr>
        <th>Giáo viên</th>
        <td>{{ $request->teacher->name }}</td>
    </tr>
    <tr>
        <th>Môn học</th>
        <td>{{ $request->schedule->subject->name }}</td>
    </tr>
    <tr>
        <th>Phòng máy</th>
        <td>{{ $request->schedule->lab->name }}</td>
    </tr>
    <tr>
        <th>Ngày nghỉ</th>
        <td>{{ $request->leave_date }}</td>
    </tr>
    <tr>
        <th>Ngày dạy bù</th>
        <td>{{ $request->makeup_date }}</td>
    </tr>
    <tr>
        <th>Lý do</th>
        <td>{{ $request->reason }}</td>
    </tr>
    <tr>
        <th>Trạng thái</th>
        <td>{{ $request->status }}</td>
    </tr>
    @if($request->status == 'Từ chối')
    <tr>
        <th>Lý do từ chối</th>
        <td>{{ $request->reason_rejection }}</td>
    </tr>
    @endif
    @if($request->status != 'Chờ duyệt')
    <tr>
        <th>Người duyệt</th>
        <td>{{ $request->approver->name ?? '' }}</td>
    </tr>
    <tr>
        <th>Thời gian duyệt</th>
        <td>{{ $request->approved_at }}</td>
    </tr>
    @endif
</table>

@if($request->status == 'Chờ duyệt')
<form method="POST" action="{{ route('admin.leave_requests.approve', $request->id) }}">
    @csrf
    <div class="mb-3">
        <label>Hành động:</label>
        <select name="status" class="form-control" required onchange="toggleReason(this)">
            <option value="Đã duyệt">Duyệt</option>
            <option value="Từ chối">Từ chối</option>
        </select>
    </div>

    <div class="mb-3" id="reason_box" style="display:none;">
        <label>Lý do từ chối</label>
        <textarea name="reason_rejection" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Xác nhận</button>
    <a href="{{ route('admin.leave_requests.index') }}" class="btn btn-secondary">Quay lại</a>
</form>

<script>
function toggleReason(select) {
    document.getElementById('reason_box').style.display = (select.value === 'Từ chối') ? 'block' : 'none';
}
</script>
@endif
@endsection
