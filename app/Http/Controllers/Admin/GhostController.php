<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ghost;
use App\Models\Lab;
use App\Models\LabGhost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;

class GhostController extends Controller
{
    public function index()
    {
        $ghosts = Ghost::all();
        return view('admin.ghosts.index', compact('ghosts'));
    }


    public function create()
    {
        return view('admin.ghosts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:ghosts,id',
            'name' => 'required',
            'file_path' => 'required',
            'size' => 'required',
        ]);

        Ghost::create($request->all());
        return redirect()->route('admin.ghosts.index')->with('success', 'Thêm bộ ghost thành công');
    }

    public function edit($id)
    {
        $ghost = Ghost::findOrFail($id);
        return view('admin.ghosts.edit', compact('ghost'));
    }

    public function update(Request $request, $id)
    {
        $ghost = Ghost::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'file_path' => 'required',
            'size' => 'required',
        ]);

        $ghost->update($request->all());
        return redirect()->route('admin.ghosts.index')->with('success', 'Cập nhật bộ ghost thành công');
    }

    public function destroy($id)
    {
        $ghost = Ghost::findOrFail($id);

        $activeAssignment = DB::table('lab_ghosts')
            ->where('ghost_id', $id)
            ->where('is_active', true)
            ->exists();

        if ($activeAssignment) {
            return redirect()->route('admin.ghosts.index')->withErrors('Không thể xóa vì bộ ghost đang được sử dụng. Vui lòng hủy active trước.');
        }

        // Nếu không active nhưng vẫn còn được gán > xóa các bản ghi gán trước
        DB::table('lab_ghosts')
            ->where('ghost_id', $id)
            ->delete();

        // Xóa ghost
        $ghost->delete();

        return redirect()->route('admin.ghosts.index')->with('success', 'Xóa bộ ghost thành công.');
    }


    public function assignForm()
    {
        $ghosts = Ghost::all();
        $labs = Lab::all();
        $assignedGhosts = LabGhost::with(['lab', 'ghost'])->orderByDesc('assigned_at')->get();

        return view('admin.ghosts.assign', compact('ghosts', 'labs', 'assignedGhosts'));
    }


    // POST: xử lý gán
    public function assign(Request $request)
    {

        $request->validate([
            'lab_id' => 'required|exists:labs,id',
            'ghost_id' => 'required|exists:ghosts,id',
            'is_active' => 'required|boolean',
        ]);

        // Check nếu is_active = true và lab đã có ghost active khác, Hủy active nếu cần
        if ($request->is_active) {
            LabGhost::where('lab_id', $request->lab_id)->where('is_active', true)->update(['is_active' => false]);
        }

        // Check trùng key lab_id + ghost_id
        $exists = LabGhost::where('lab_id', $request->lab_id)
            ->where('ghost_id', $request->ghost_id)->exists();
        // Nếu đã có bản ghi trùng, không cho phép gán
        if ($exists) {
            return back()->withErrors('Ghost đã được gán cho phòng máy này.');
        }

        LabGhost::create([
            'lab_id' => $request->lab_id,
            'ghost_id' => $request->ghost_id,
            'assigned_at' => now(),
            'is_active' => $request->is_active,
        ]);

        Flash::success('Gán bộ ghost thành công.');
        return redirect()->route('admin.ghosts.assignForm');
    }

    public function assignedList()
    {
        $assignedGhosts = LabGhost::with(['lab', 'ghost'])->orderByDesc('assigned_at')->get();

        return view('admin.ghosts.assigned-list', compact('assignedGhosts'));
    }

    //"Hủy gán" bộ ghost khỏi một phòng máy
    public function unassign($labId, $ghostId)
    {
        LabGhost::where('lab_id', $labId)->where('ghost_id', $ghostId)->delete();
        return redirect()->back()->with('success', 'Đã hủy gán ghost cho phòng máy thành công.');
    }

    //"Hủy active" bộ ghost khỏi một phòng máy
    public function deactivate($labId, $ghostId)
    {
        LabGhost::where('lab_id', $labId)->where('ghost_id', $ghostId)->update(['is_active' => false]);

        return redirect()->back()->with('success', 'Đã hủy active bộ ghost.');
    }

    // "Thay thế ghost đang active" bằng ghost khác
    public function replaceActive(Request $request)
    {
        $request->validate([
            'lab_id' => 'required|exists:labs,id',
            'ghost_id' => 'required|exists:ghosts,id',
        ]);

        // Hủy tất cả ghost đang active của phòng này
        LabGhost::where('lab_id', $request->lab_id)->update(['is_active' => false]);

        // Cập nhật hoặc tạo mới bản ghi mới active
        LabGhost::updateOrInsert(
            ['lab_id' => $request->lab_id, 'ghost_id' => $request->ghost_id],
            [
                'assigned_at' => now(),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        return redirect()->back()->with('success', 'Đã thay thế bộ ghost active thành công.');
    }


}
