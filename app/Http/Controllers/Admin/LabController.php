<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class LabController extends Controller
{
    public function index()
    {
        // $labs = Lab::with('manager')->paginate(10);
        $labs = Lab::withCount('computers')->paginate(10);
        return view('admin.labs.index', compact('labs'));
    }

    public function create()
    {
        $managers = User::whereHas('role', fn($q) => $q->where('name', 'manager'))->get();
        return view('admin.labs.create', compact('managers'));
    }

    public function store(Request $request)
    {
        $rules = [
            'id' => 'required|unique:labs,id',
            'name' => 'required',
            'manager_id' => 'required|exists:users,id'
        ];

        $messages = [
            'id.unique' => 'Mã phòng máy đã tồn tại.',
            'manager_id.exists' => 'Giáo viên phụ trách không hợp lệ.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Lab::create($request->all());
        Flash::success('Thêm phòng máy thành công.');
        return redirect()->route('admin.labs.index');
    }

    public function edit($id)
    {
        $lab = Lab::findOrFail($id);
        $managers = User::whereHas('role', fn($q) => $q->where('name', 'manager'))->get();
        return view('admin.labs.edit', compact('lab', 'managers'));
    }

    public function update(Request $request, $id)
    {
        $lab = Lab::findOrFail($id);

        $rules = [
            'name' => 'required',
            'manager_id' => 'required|exists:users,id',
        ];

        $messages = [
            'manager_id.exists' => 'Giáo viên phụ trách không hợp lệ.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $lab->update($request->all());
        Flash::success('Cập nhật phòng máy thành công.');
        return redirect()->route('admin.labs.index');
    }

    public function show($id)
    {
        $lab = Lab::with('manager')->findOrFail($id);
        return view('admin.labs.show', compact('lab'));
    }

    public function destroy($id)
    {
        $lab = Lab::with(['computers', 'schedules'])->findOrFail($id);

        if ($lab->computers->count() > 0 || $lab->schedules->count() > 0) {
            Flash::error('Không thể xoá vì phòng có máy tính hoặc lịch học liên quan.');
            return redirect()->route('admin.labs.index');
        }

        $lab->delete();
        Flash::success('Xoá phòng máy thành công.');
        return redirect()->route('admin.labs.index');
    }
}
