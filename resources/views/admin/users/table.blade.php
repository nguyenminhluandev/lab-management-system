@if($users->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm">Xem</a>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->withQueryString()->links() }}
@else
    <p>Không có người dùng nào phù hợp.</p>
@endif
