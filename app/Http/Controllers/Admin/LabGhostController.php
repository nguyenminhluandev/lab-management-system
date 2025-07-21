<?php

namespace App\Http\Controllers\Admin;

use App\Models\LabGhost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class LabGhostController extends Controller
{
    public function index()
    {
        $labGhosts = LabGhost::paginate(10);
        return view('admin.lab_ghosts.index', compact('labGhosts'));
    }

    public function create()
    {
        return view('admin.lab_ghosts.create');
    }

    public function store(Request $request)
    {
        LabGhost::create($request->all());
        Flash::success('LabGhost created successfully.');
        return redirect()->route('admin.lab_ghosts.index');
    }

    public function show($id)
    {
        $labGhost = LabGhost::find($id);
        if (!$labGhost) {
            Flash::error('LabGhost not found');
            return redirect()->route('admin.lab_ghosts.index');
        }
        return view('admin.lab_ghosts.show', compact('labGhost'));
    }

    public function edit($id)
    {
        $labGhost = LabGhost::find($id);
        if (!$labGhost) {
            Flash::error('LabGhost not found');
            return redirect()->route('admin.labghosts.index');
        }
        return view('admin.lab_ghosts.edit', compact('labGhost'));
    }

    public function update(Request $request, $id)
    {
        $labGhost = LabGhost::find($id);
        if (!$labGhost) {
            Flash::error('LabGhost not found');
            return redirect()->route('admin.lab_ghosts.index');
        }
        $labGhost->update($request->all());
        Flash::success('LabGhost updated successfully.');
        return redirect()->route('admin.lab_ghosts.index');
    }

    public function destroy($id)
    {
        $labGhost = LabGhost::find($id);
        if (!$labGhost) {
            Flash::error('LabGhost not found');
            return redirect()->route('admin.lab_ghosts.index');
        }
        $labGhost->delete();
        Flash::success('LabGhost deleted successfully.');
        return redirect()->route('admin.lab_ghosts.index');
    }
}
