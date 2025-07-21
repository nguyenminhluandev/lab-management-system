<?php

namespace App\Http\Controllers\Teacher;

use App\Models\IssueComputer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class IssueComputerController extends Controller
{
    public function index()
    {
        $issueComputers = IssueComputer::paginate(10);
        return view('teacher.issuecomputers.index', compact('issueComputers'));
    }

    public function create()
    {
        return view('teacher.issuecomputers.create');
    }

    public function store(Request $request)
    {
        IssueComputer::create($request->all());
        Flash::success('IssueComputer created successfully.');
        return redirect()->route('teacher.issuecomputers.index');
    }

    public function show($id)
    {
        $issueComputer = IssueComputer::find($id);
        if (!$issueComputer) {
            Flash::error('IssueComputer not found');
            return redirect()->route('teacher.issuecomputers.index');
        }
        return view('teacher.issuecomputers.show', compact('issueComputer'));
    }

    public function edit($id)
    {
        $issueComputer = IssueComputer::find($id);
        if (!$issueComputer) {
            Flash::error('IssueComputer not found');
            return redirect()->route('teacher.issuecomputers.index');
        }
        return view('teacher.issuecomputers.edit', compact('issueComputer'));
    }

    public function update(Request $request, $id)
    {
        $issueComputer = IssueComputer::find($id);
        if (!$issueComputer) {
            Flash::error('IssueComputer not found');
            return redirect()->route('teacher.issuecomputers.index');
        }
        $issueComputer->update($request->all());
        Flash::success('IssueComputer updated successfully.');
        return redirect()->route('teacher.issuecomputers.index');
    }

    public function destroy($id)
    {
        $issueComputer = IssueComputer::find($id);
        if (!$issueComputer) {
            Flash::error('IssueComputer not found');
            return redirect()->route('teacher.issuecomputers.index');
        }
        $issueComputer->delete();
        Flash::success('IssueComputer deleted successfully.');
        return redirect()->route('teacher.issuecomputers.index');
    }
}
