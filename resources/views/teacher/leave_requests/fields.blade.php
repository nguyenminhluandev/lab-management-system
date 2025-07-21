<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Schedule Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('schedule_id', 'Schedule Id:') !!}
    {!! Form::text('schedule_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Teacher Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('teacher_id', 'Teacher Id:') !!}
    {!! Form::text('teacher_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Leave Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('leave_date', 'Leave Date:') !!}
    {!! Form::text('leave_date', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Makeup Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('makeup_date', 'Makeup Date:') !!}
    {!! Form::text('makeup_date', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Reason Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reason', 'Reason:') !!}
    {!! Form::text('reason', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Reason Rejection Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reason_rejection', 'Reason Rejection:') !!}
    {!! Form::text('reason_rejection', null, ['class' => 'form-control']) !!}
</div>

<!-- Approved By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('approved_by', 'Approved By:') !!}
    {!! Form::text('approved_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Approved At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('approved_at', 'Approved At:') !!}
    {!! Form::text('approved_at', null, ['class' => 'form-control']) !!}
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