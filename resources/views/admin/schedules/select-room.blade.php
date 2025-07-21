@extends('layouts.app')
@section('title', 'Xem TKB theo Phòng máy')

@section('content')
<h4>Xem thời khóa biểu theo phòng máy</h4>
<form method="POST" action="{{ route('admin.schedules.renderRoom') }}">
    @csrf
    <div class="row mb-3">
        <div class="col-md-4">
            <label>Phòng máy</label>
            <select name="lab_id" class="form-control">
                @foreach($labs as $lab)
                    <option value="{{ $lab->id }}">{{ $lab->name }}</option>
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
