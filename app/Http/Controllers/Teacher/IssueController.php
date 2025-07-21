<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Models\Issue;
use App\Models\IssueComputer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::with('computers')
            ->where('reported_by', Auth::id())
            ->orderByDesc('reported_date')
            ->get();

        return view('teacher.issues.index', compact('issues'));
    }

    public function create()
    {
        $computers = Computer::orderBy('lab_id')->get();
        return view('teacher.issues.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'computer_ids' => 'required|array',
            'reported_date' => 'required|date',
        ]);

        $issue = Issue::create([
            'description' => $request->description,
            'reported_by' => Auth::id(),
            'reported_date' => $request->reported_date,
        ]);

        foreach ($request->computer_ids as $computerId) {
            IssueComputer::create([
                'issue_id' => $issue->id,
                'computer_id' => $computerId,
            ]);
        }

        return redirect()->route('teacher.issues.index')->with('success', 'Báo cáo sự cố thành công.');
    }
}
