@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Thống kê</h3>

    <div class="row">
        <div class="col-md-6">
            <h5>Thống kê giờ dạy giáo viên</h5>
            <form action="{{ route('admin.statistics.teacher') }}" method="GET">
                <div class="form-group">
                    <label>Học kỳ</label>
                    <select name="semester_id" class="form-control" required>
                        @foreach($semesters as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Giáo viên (tuỳ chọn)</label>
                    <select name="teacher_id" class="form-control">
                        <option value="">-- Tất cả --</option>
                        @foreach($teachers as $t)
                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success mt-2">Thống kê</button>
            </form>
        </div>

        <div class="col-md-6">
            <h5>Thống kê sử dụng phòng máy</h5>
            <form action="{{ route('admin.statistics.lab') }}" method="GET">
                <div class="form-group">
                    <label>Học kỳ</label>
                    <select name="semester_id" class="form-control" required>
                        @foreach($semesters as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Phòng máy (tuỳ chọn)</label>
                    <select name="lab_id" class="form-control">
                        <option value="">-- Tất cả --</option>
                        @foreach($labs as $lab)
                            <option value="{{ $lab->id }}">{{ $lab->id }} - {{ $lab->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success mt-2">Thống kê</button>
            </form>
        </div>
    </div>
</div>
@endsection
