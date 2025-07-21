<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class ComputerController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $computers = Computer::with('lab')
            ->when($keyword, function ($query, $keyword) {
                $query->where('id', 'like', "%$keyword%")
                    ->orWhere('name', 'like', "%$keyword%")
                    ->orWhereHas('lab', function ($q) use ($keyword) {
                        $q->where('name', 'like', "%$keyword%");
                    });
            })
            ->orderBy('id')
            ->paginate(10);

        return view('admin.computers.index', compact('computers'));
    }


    public function create()
    {
        $labs = Lab::pluck('name', 'id');
        return view('admin.computers.create', compact('labs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|unique:computers,id',
            'name' => 'required',
            'lab_id' => 'required|exists:labs,id',
            'cpu' => 'nullable|string',
            'ram' => 'nullable|string',
            'storage' => 'nullable|string',
            'status' => 'required|in:Hoạt động,Hỏng'
        ]);

        if ($validator->fails()) {
            Flash::error('Dữ liệu không hợp lệ.');
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Computer::create($request->all());
        Flash::success('Thêm máy tính thành công.');
        return redirect()->route('admin.computers.index');
    }

    public function show($id)
    {
        $computer = Computer::with('lab')->findOrFail($id);
        return view('admin.computers.show', compact('computer'));
    }

    public function edit($id)
    {
        $computer = Computer::findOrFail($id);
        $labs = Lab::pluck('name', 'id');
        return view('admin.computers.edit', compact('computer', 'labs'));
    }

    public function update(Request $request, $id)
    {
        $computer = Computer::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lab_id' => 'required|exists:labs,id',
            'cpu' => 'nullable|string',
            'ram' => 'nullable|string',
            'storage' => 'nullable|string',
            'status' => 'required|in:Hoạt động,Hỏng'
        ]);

        if ($validator->fails()) {
            Flash::error('Dữ liệu không hợp lệ.');
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $computer->update($request->all());
        Flash::success('Cập nhật thông tin thành công.');
        return redirect()->route('admin.computers.index');
    }

    public function destroy($id)
    {
        $computer = Computer::find($id);

        if ($computer->issues()->exists()) {
            Flash::error('Không thể xóa máy tính do có liên quan đến sự cố.');
            return redirect()->route('admin.computers.index');
        }

        $computer->delete();
        Flash::success('Xóa máy tính thành công.');
        return redirect()->route('admin.computers.index');
    }

    public function listByLab($lab_id)
    {
        $lab = Lab::with('computers')->findOrFail($lab_id);
        $computers = $lab->computers;
        return view('admin.computers.by_lab', compact('lab','computers'));
    }
}
