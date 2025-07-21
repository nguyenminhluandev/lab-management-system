<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('role');

        // Tìm kiếm theo tên hoặc id
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%");
            });
        }

        $users = $query->paginate(10);
        return view('admin.users.index', compact('users', 'search'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ], [
            'id.required' => 'Vui lòng nhập mã người dùng.',
            'id.unique' => 'Mã người dùng đã tồn tại.',
            'name.required' => 'Vui lòng nhập tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        User::create($input);

        Flash::success('Thêm người dùng thành công.');
        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
        $user = User::with('role')->find($id);

        if (!$user) {
            Flash::error('Không thể tải thông tin người dùng, vui lòng thử lại.');
            return redirect()->route('admin.users.index');
        }

        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            Flash::error('Không tìm thấy người dùng.');
            return redirect()->route('admin.users.index');
        }

        $roles = Role::pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            Flash::error('Không tìm thấy người dùng.');
            return redirect()->route('admin.users.index');
        }

        // Nếu đang là giáo viên phụ trách phòng máy
        $isManager = Lab::where('manager_id', $user->id)->exists();
        $newRoleId = $request->input('role_id');
        $roleTeacherOrAdmin = Role::whereIn('id', [$newRoleId])
                                  ->whereIn('name', ['teacher', 'admin'])
                                  ->exists();

        if ($isManager && $roleTeacherOrAdmin) {
            Flash::error('Không thể thay đổi vai trò vì người dùng đang phụ trách phòng máy.');
            return redirect()->route('admin.users.edit', $user->id);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required', 'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'role_id' => 'required|exists:roles,id',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',
            'email.email' => 'Email không đúng định dạng.',
        ]);

        $input = $request->only(['name', 'email', 'role_id']);
        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->input('password'));
        }

        $user->update($input);
        Flash::success('Cập nhật người dùng thành công.');
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            Flash::error('Không tìm thấy người dùng.');
            return redirect()->route('admin.users.index');
        }

        // Kiểm tra dữ liệu liên quan
        $hasRelation = Lab::where('manager_id', $id)->exists()
            || $user->schedules()->exists()
            || $user->issues()->exists()
            || $user->leaveRequests()->exists();

        if ($hasRelation) {
            Flash::error('Không thể xóa người dùng vì có dữ liệu liên quan.');
            return redirect()->route('admin.users.index');
        }

        $user->delete();
        Flash::success('Xóa người dùng thành công.');
        return redirect()->route('admin.users.index');
    }
}
