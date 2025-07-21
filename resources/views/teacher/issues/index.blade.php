@extends('layouts.app')

@section('title', 'Lịch sử báo cáo sự cố')

@section('content')
<div class="container">

    <h3>📋 Lịch sử sự cố đã báo</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('teacher.issues.create') }}" class="btn btn-primary mb-3">+ Báo cáo sự cố</a>

    @if ($issues->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã sự cố</th>
                    <th>Máy tính</th>
                    <th>Ngày báo cáo</th>
                    <th>Trạng thái</th>
                    <th>Người xử lý</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($issues as $issue)
                    <tr>
                        <td>#{{ $issue->id }}</td>
                        <td>
                            @foreach ($issue->computers as $c)
                                {{ $c->id }}@if(!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>{{ $issue->reported_date }}</td>
                        <td>{{ $issue->status }}</td>
                        <td>{{ $issue->fixed_by ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Chưa có sự cố nào được báo cáo.</p>
    @endif
</div>
@endsection
