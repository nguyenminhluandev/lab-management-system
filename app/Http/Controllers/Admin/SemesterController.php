<?php

namespace App\Http\Controllers\Admin;

use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::orderBy('start_date', 'desc')->paginate(10);
        return view('admin.semesters.index', compact('semesters'));
    }

    public function create()
    {
        return view('admin.semesters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'academic_year' => 'required',
        ]);

        Semester::create($request->all());
        Flash::success('Thêm học kỳ thành công.');
        return redirect()->route('admin.semesters.index');
    }

    public function edit(Semester $semester)
    {
        return view('admin.semesters.edit', compact('semester'));
    }

    public function update(Request $request, Semester $semester)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'academic_year' => 'required',
        ]);

        $semester->update($request->all());
        Flash::success('Cập nhật học kỳ thành công.');
        return redirect()->route('admin.semesters.index');
    }

    public function destroy(Semester $semester)
    {
        if ($semester->schedules()->exists()) {
            Flash::error('Không thể xóa học kỳ vì có lịch dạy liên quan.');
            return redirect()->route('admin.semesters.index');
        }

        $semester->delete();
        Flash::success('Xóa học kỳ thành công.');
        return redirect()->route('admin.semesters.index');
    }
}
