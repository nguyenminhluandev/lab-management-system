@extends('layouts.app')
@section('title', 'Xem TKB theo Giáo viên')

@section('content')
<h4>Xem thời khóa biểu theo giáo viên</h4>
<form method="POST" action="{{ route('admin.schedules.renderTeacher') }}">
    @csrf
    <div class="row mb-3">
        <div class="col-md-4">
            <label>Giáo viên</label>
            <select name="teacher_id" class="form-control">
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>Học kỳ</label>
            <select name="semester_id" class="form-control">
                @foreach($semesters as $sem)
                    <option value="{{ $sem->id }}">{{ $sem->name }} {{ $sem->academic_year}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 mt-4 pt-2">
            <button type="submit" class="btn btn-primary mt-2">Xem thời khóa biểu</button>
        </div>
    </div>
</form>
@endsection
