<?php

namespace App\Http\Controllers\Manager;

use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::paginate(10);
        return view('manager.equipment.index', compact('equipment'));
    }

    public function create()
    {
        return view('manager.equipment.create');
    }

    public function store(Request $request)
    {
        Equipment::create($request->all());
        Flash::success('Equipment created successfully.');
        return redirect()->route('manager.equipment.index');
    }

    public function show($id)
    {
        $item = Equipment::find($id);
        if (!$item) {
            Flash::error('Equipment not found');
            return redirect()->route('manager.equipment.index');
        }
        return view('manager.equipment.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Equipment::find($id);
        if (!$item) {
            Flash::error('Equipment not found');
            return redirect()->route('manager.equipment.index');
        }
        return view('manager.equipment.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Equipment::find($id);
        if (!$item) {
            Flash::error('Equipment not found');
            return redirect()->route('manager.equipment.index');
        }
        $item->update($request->all());
        Flash::success('Equipment updated successfully.');
        return redirect()->route('manager.equipment.index');
    }

    public function destroy($id)
    {
        $item = Equipment::find($id);
        if (!$item) {
            Flash::error('Equipment not found');
            return redirect()->route('manager.equipment.index');
        }
        $item->delete();
        Flash::success('Equipment deleted successfully.');
        return redirect()->route('manager.equipment.index');
    }
}
