<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(10);
        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:subjects,id',
            'name' => 'required'
        ]);

        Subject::create($request->only(['id', 'name']));
        Flash::success('Thêm môn học thành công.');
        return redirect()->route('admin.subjects.index');
    }

    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.subjects.show', compact('subject'));
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'id' => 'required|unique:subjects,id,' . $id
        ]);

        $subject->update($request->only(['id', 'name']));
        Flash::success('Cập nhật môn học thành công.');
        return redirect()->route('admin.subjects.index');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $used = DB::table('schedules')->where('subject_id', $id)->exists();

        if ($used) {
            Flash::error('Không thể xóa môn học vì có lịch dạy liên quan.');
            return redirect()->route('admin.subjects.index');
        }

        $subject->delete();
        Flash::success('Xóa môn học thành công.');
        return redirect()->route('admin.subjects.index');
    }
}
