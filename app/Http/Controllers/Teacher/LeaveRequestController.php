<?php

namespace App\Http\Controllers\Teacher;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laracasts\Flash\Flash;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaveRequests = LeaveRequest::paginate(10);
        return view('leaverequests.index', compact('leaveRequests'));
    }

    public function create()
    {
        return view('leaverequests.create');
    }

    public function store(Request $request)
    {
        LeaveRequest::create($request->all());
        Flash::success('LeaveRequest created successfully.');
        return redirect()->route('leaverequests.index');
    }

    public function show($id)
    {
        $leaveRequest = LeaveRequest::find($id);
        if (!$leaveRequest) {
            Flash::error('LeaveRequest not found');
            return redirect()->route('leaverequests.index');
        }
        return view('leaverequests.show', compact('leaveRequest'));
    }

    public function edit($id)
    {
        $leaveRequest = LeaveRequest::find($id);
        if (!$leaveRequest) {
            Flash::error('LeaveRequest not found');
            return redirect()->route('leaverequests.index');
        }
        return view('leaverequests.edit', compact('leaveRequest'));
    }

    public function update(Request $request, $id)
    {
        $leaveRequest = LeaveRequest::find($id);
        if (!$leaveRequest) {
            Flash::error('LeaveRequest not found');
            return redirect()->route('leaverequests.index');
        }
        $leaveRequest->update($request->all());
        Flash::success('LeaveRequest updated successfully.');
        return redirect()->route('leaverequests.index');
    }

    public function destroy($id)
    {
        $leaveRequest = LeaveRequest::find($id);
        if (!$leaveRequest) {
            Flash::error('LeaveRequest not found');
            return redirect()->route('leaverequests.index');
        }
        $leaveRequest->delete();
        Flash::success('LeaveRequest deleted successfully.');
        return redirect()->route('leaverequests.index');
    }
}
