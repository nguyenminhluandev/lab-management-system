<?php

namespace App\Http\Controllers\Admin;

use App\Models\Equipment;
use App\Models\Lab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $labs = Lab::all();
        $query = Equipment::query()->with('lab');

        if ($request->has('lab_id') && $request->lab_id != '') {
            $query->where('lab_id', $request->lab_id);
        }

        $equipments = $query->orderBy('lab_id')->paginate(10);

        return view('admin.equipments.index', compact('equipments', 'labs'));
    }


    // public function show($id)
    // {
    //     $equipment = Equipment::with('lab')->findOrFail($id);
    //     return view('admin.equipments.show', compact('equipment'));
    // }

    public function create()
    {
        $labs = Lab::all();
        return view('admin.equipments.create', compact('labs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lab_id' => 'required|exists:labs,id',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:Hoạt động,Hỏng',
            'description' => 'nullable|string',
        ]);

        Equipment::create($request->all());

        Flash::success('Thêm vật tư thành công.');
        return redirect()->route('admin.equipments.index');
    }

    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);
        $labs = Lab::all();
        return view('admin.equipments.edit', compact('equipment', 'labs'));
    }

    public function update(Request $request, $id)
    {
        $equipment = Equipment::findOrFail($id);

        $request->validate([
            'lab_id' => 'required|exists:labs,id',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:Hoạt động,Hỏng',
            'description' => 'nullable|string',
        ]);

        $equipment->update($request->all());

        Flash::success('Cập nhật vật tư thành công.');
        return redirect()->route('admin.equipments.index');
    }

    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();

        Flash::success('Xóa vật tư thành công.');
        return redirect()->route('admin.equipments.index');
    }
}
