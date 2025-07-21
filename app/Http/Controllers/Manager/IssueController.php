<?php

namespace App\Http\Controllers\Manager;

use App\Models\Issue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{
    public function index()
    {
        $labs = Auth::user()->managedLabs; // phòng máy mà giáo viên phụ trách
        $issues = Issue::with(['computers', 'reporter'])
            ->whereHas('computers', function ($q) use ($labs) {
                $q->whereIn('lab_id', $labs->pluck('id'));
            })
            ->latest()
            ->get();

        return view('manager.issues.index', compact('issues'));
    }

    public function edit($id)
    {
        $issue = Issue::with('computers')->findOrFail($id);

        return view('manager.issues.edit', compact('issue'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Chưa xử lý,Đã xử lý',
            'fixed_date' => 'required_if:status,Đã xử lý|date|after_or_equal:reported_date',
            'fixed_by' => 'required_if:status,Đã xử lý|string|max:255',
        ]);

        $issue = Issue::findOrFail($id);
        $issue->update([
            'status' => $request->status,
            'fixed_date' => $request->status === 'Đã xử lý' ? $request->fixed_date : null,
            'fixed_by' => $request->status === 'Đã xử lý' ? $request->fixed_by : null,
        ]);

        return redirect()->route('manager.issues.index')->with('success', 'Cập nhật thành công');
    }

    public function search(Request $request)
    {
        $labs = Auth::user()->managedLabs;
        $query = Issue::with(['computers', 'reporter'])
            ->whereHas('computers', function ($q) use ($labs) {
                $q->whereIn('lab_id', $labs->pluck('id'));
            });

        if ($request->filled('computer_id')) {
            $query->whereHas('computers', fn($q) => $q->where('id', $request->computer_id));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('from_date')) {
            $query->whereDate('reported_date', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('reported_date', '<=', $request->to_date);
        }

        $issues = $query->latest()->get();
        return view('manager.issues.result', compact('issues'));
    }

}
