<div class="mb-3">
    <label for="id" class="form-label">Mã người dùng</label>
    <input type="text" class="form-control" name="id" id="id"
           value="{{ old('id', $user->id ?? '') }}" {{ isset($user) ? 'readonly' : '' }}>
</div>

<div class="mb-3">
    <label for="name" class="form-label">Tên</label>
    <input type="text" class="form-control" name="name" id="name"
           value="{{ old('name', $user->name ?? '') }}">
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email"
           value="{{ old('email', $user->email ?? '') }}">
</div>

<div class="mb-3">
    <label for="role_id" class="form-label">Vai trò</label>
    <select name="role_id" class="form-select">
        <option value="">-- Chọn vai trò --</option>
        @foreach($roles as $id => $name)
            <option value="{{ $id }}" {{ old('role_id', $user->role_id ?? '') == $id ? 'selected' : '' }}>
                {{ ucfirst($name) }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="password" class="form-label">Mật khẩu {{ isset($user) ? '(bỏ trống nếu không đổi)' : '' }}</label>
    <input type="password" class="form-control" name="password" id="password">
</div>

<button class="btn btn-success">{{ isset($user) ? 'Cập nhật' : 'Thêm mới' }}</button>
<a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Hủy</a>
