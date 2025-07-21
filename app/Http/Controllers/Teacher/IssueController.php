<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Issue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::paginate(10);
        return view('teacher.issues.index', compact('issues'));
    }

    public function create()
    {
        return view('teacher.issues.create');
    }

    public function store(Request $request)
    {
        Issue::create($request->all());
        Flash::success('Issue created successfully.');
        return redirect()->route('teacher.issues.index');
    }

    public function show($id)
    {
        $issue = Issue::find($id);
        if (!$issue) {
            Flash::error('Issue not found');
            return redirect()->route('teacher.issues.index');
        }
        return view('teacher.issues.show', compact('issue'));
    }

    public function edit($id)
    {
        $issue = Issue::find($id);
        if (!$issue) {
            Flash::error('Issue not found');
            return redirect()->route('teacher.issues.index');
        }
        return view('teacher.issues.edit', compact('issue'));
    }

    public function update(Request $request, $id)
    {
        $issue = Issue::find($id);
        if (!$issue) {
            Flash::error('Issue not found');
            return redirect()->route('teacher.issues.index');
        }
        $issue->update($request->all());
        Flash::success('Issue updated successfully.');
        return redirect()->route('teacher.issues.index');
    }

    public function destroy($id)
    {
        $issue = Issue::find($id);
        if (!$issue) {
            Flash::error('Issue not found');
            return redirect()->route('teacher.issues.index');
        }
        $issue->delete();
        Flash::success('Issue deleted successfully.');
        return redirect()->route('teacher.issues.index');
    }
}
