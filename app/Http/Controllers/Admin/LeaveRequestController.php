<?php

namespace App\Http\Controllers\Admin;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    // Danh sách tất cả yêu cầu
    public function index()
    {
        $requests = LeaveRequest::with(['schedule', 'teacher', 'approver'])->latest()->paginate(10);
        return view('admin.leave_requests.index', compact('requests'));
    }

    // Chi tiết yêu cầu
    public function show($id)
    {
        $request = LeaveRequest::with(['schedule', 'teacher', 'approver'])->findOrFail($id);
        return view('admin.leave_requests.show', compact('request'));
    }

    // Duyệt hoặc từ chối
    public function approve(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Đã duyệt,Từ chối',
            'reason_rejection' => 'nullable|required_if:status,Từ chối',
        ]);

        $leave = LeaveRequest::findOrFail($id);
        $leave->status = $request->status;
        $leave->reason_rejection = $request->reason_rejection;
        $leave->approved_by = Auth::id();
        $leave->approved_at = now();
        $leave->save();

        Flash::success('Xử lý yêu cầu thành công.');
        return redirect()->route('admin.leave_requests.index');
    }

}
