@extends('layouts.app')
@section('title', 'Danh sách vật tư')
@section('content')
    <div class="container">
        <h2>📦 Vật tư phòng máy</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Phòng</th>
                    <th>Tên vật tư</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Mô tả</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipments as $equipment)
                    <tr>
                        <td>{{ $equipment->lab->name }}</td>
                        <td>{{ $equipment->name }}</td>
                        <td>{{ $equipment->quantity }}</td>
                        <td>
                            @if($equipment->status == 'Hoạt động')
                                <span class="badge bg-success">{{$equipment->status}}</span>
                            @else
                                <span class="badge bg-danger">{{$equipment->status}}</span>
                            @endif
                        </td>
                        <td>{{ $equipment->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $equipments->links() }}
@endsection
