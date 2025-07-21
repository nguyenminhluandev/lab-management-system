<table>
    <thead>
        <tr>
            <th>Phòng máy</th>
            <th>Số buổi sử dụng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->lab->id }} - {{ $row->lab->name }}</td>
                <td>{{ $row->total_sessions }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
