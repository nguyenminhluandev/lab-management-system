<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Lab Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lab_id', 'Lab Id:') !!}
    {!! Form::text('lab_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Subject Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject_id', 'Subject Id:') !!}
    {!! Form::text('subject_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Teacher Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('teacher_id', 'Teacher Id:') !!}
    {!! Form::text('teacher_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Semester Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('semester_id', 'Semester Id:') !!}
    {!! Form::text('semester_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Start Period Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_period', 'Start Period:') !!}
    {!! Form::text('start_period', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- End Period Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_period', 'End Period:') !!}
    {!! Form::text('end_period', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Start Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_time', 'Start Time:') !!}
    {!! Form::text('start_time', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- End Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_time', 'End Time:') !!}
    {!! Form::text('end_time', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    {!! Form::text('created_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! Form::text('updated_at', null, ['class' => 'form-control']) !!}
</div>