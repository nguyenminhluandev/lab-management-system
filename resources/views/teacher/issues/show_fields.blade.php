<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $issue->id }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $issue->description }}</p>
</div>

<!-- Reported By Field -->
<div class="col-sm-12">
    {!! Form::label('reported_by', 'Reported By:') !!}
    <p>{{ $issue->reported_by }}</p>
</div>

<!-- Reported Date Field -->
<div class="col-sm-12">
    {!! Form::label('reported_date', 'Reported Date:') !!}
    <p>{{ $issue->reported_date }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $issue->status }}</p>
</div>

<!-- Fixed Date Field -->
<div class="col-sm-12">
    {!! Form::label('fixed_date', 'Fixed Date:') !!}
    <p>{{ $issue->fixed_date }}</p>
</div>

<!-- Fixed By Field -->
<div class="col-sm-12">
    {!! Form::label('fixed_by', 'Fixed By:') !!}
    <p>{{ $issue->fixed_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $issue->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $issue->updated_at }}</p>
</div>

