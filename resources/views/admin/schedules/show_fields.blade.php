<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $schedule->id }}</p>
</div>

<!-- Lab Id Field -->
<div class="col-sm-12">
    {!! Form::label('lab_id', 'Lab Id:') !!}
    <p>{{ $schedule->lab_id }}</p>
</div>

<!-- Subject Id Field -->
<div class="col-sm-12">
    {!! Form::label('subject_id', 'Subject Id:') !!}
    <p>{{ $schedule->subject_id }}</p>
</div>

<!-- Teacher Id Field -->
<div class="col-sm-12">
    {!! Form::label('teacher_id', 'Teacher Id:') !!}
    <p>{{ $schedule->teacher_id }}</p>
</div>

<!-- Semester Id Field -->
<div class="col-sm-12">
    {!! Form::label('semester_id', 'Semester Id:') !!}
    <p>{{ $schedule->semester_id }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $schedule->date }}</p>
</div>

<!-- Start Period Field -->
<div class="col-sm-12">
    {!! Form::label('start_period', 'Start Period:') !!}
    <p>{{ $schedule->start_period }}</p>
</div>

<!-- End Period Field -->
<div class="col-sm-12">
    {!! Form::label('end_period', 'End Period:') !!}
    <p>{{ $schedule->end_period }}</p>
</div>

<!-- Start Time Field -->
<div class="col-sm-12">
    {!! Form::label('start_time', 'Start Time:') !!}
    <p>{{ $schedule->start_time }}</p>
</div>

<!-- End Time Field -->
<div class="col-sm-12">
    {!! Form::label('end_time', 'End Time:') !!}
    <p>{{ $schedule->end_time }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $schedule->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $schedule->updated_at }}</p>
</div>

