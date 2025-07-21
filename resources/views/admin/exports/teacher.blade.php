<table>
    <thead>
        <tr>
            <th>Giáo viên</th>
            <th>Tổng số tiết dạy</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->teacher->name }}</td>
                <td>{{ $row->total_periods }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
