<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        Role::create($request->all());
        Flash::success('Role created successfully.');
        return redirect()->route('admin.roles.index');
    }

    public function show($id)
    {
        $role = Role::find($id);
        if (!$role) {
            Flash::error('Role not found');
            return redirect()->route('admin.roles.index');
        }
        return view('admin.roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        if (!$role) {
            Flash::error('Role not found');
            return redirect()->route('admin.roles.index');
        }
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        if (!$role) {
            Flash::error('Role not found');
            return redirect()->route('admin.roles.index');
        }
        $role->update($request->all());
        Flash::success('Role updated successfully.');
        return redirect()->route('admin.roles.index');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if (!$role) {
            Flash::error('Role not found');
            return redirect()->route('admin.roles.index');
        }
        $role->delete();
        Flash::success('Role deleted successfully.');
        return redirect()->route('admin.roles.index');
    }
}
