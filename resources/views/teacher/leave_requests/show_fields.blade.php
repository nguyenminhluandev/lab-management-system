<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $leaveRequest->id }}</p>
</div>

<!-- Schedule Id Field -->
<div class="col-sm-12">
    {!! Form::label('schedule_id', 'Schedule Id:') !!}
    <p>{{ $leaveRequest->schedule_id }}</p>
</div>

<!-- Teacher Id Field -->
<div class="col-sm-12">
    {!! Form::label('teacher_id', 'Teacher Id:') !!}
    <p>{{ $leaveRequest->teacher_id }}</p>
</div>

<!-- Leave Date Field -->
<div class="col-sm-12">
    {!! Form::label('leave_date', 'Leave Date:') !!}
    <p>{{ $leaveRequest->leave_date }}</p>
</div>

<!-- Makeup Date Field -->
<div class="col-sm-12">
    {!! Form::label('makeup_date', 'Makeup Date:') !!}
    <p>{{ $leaveRequest->makeup_date }}</p>
</div>

<!-- Reason Field -->
<div class="col-sm-12">
    {!! Form::label('reason', 'Reason:') !!}
    <p>{{ $leaveRequest->reason }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $leaveRequest->status }}</p>
</div>

<!-- Reason Rejection Field -->
<div class="col-sm-12">
    {!! Form::label('reason_rejection', 'Reason Rejection:') !!}
    <p>{{ $leaveRequest->reason_rejection }}</p>
</div>

<!-- Approved By Field -->
<div class="col-sm-12">
    {!! Form::label('approved_by', 'Approved By:') !!}
    <p>{{ $leaveRequest->approved_by }}</p>
</div>

<!-- Approved At Field -->
<div class="col-sm-12">
    {!! Form::label('approved_at', 'Approved At:') !!}
    <p>{{ $leaveRequest->approved_at }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $leaveRequest->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $leaveRequest->updated_at }}</p>
</div>

