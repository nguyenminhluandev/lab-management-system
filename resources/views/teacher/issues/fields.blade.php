<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Reported By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reported_by', 'Reported By:') !!}
    {!! Form::text('reported_by', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Reported Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reported_date', 'Reported Date:') !!}
    {!! Form::text('reported_date', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Fixed Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fixed_date', 'Fixed Date:') !!}
    {!! Form::text('fixed_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Fixed By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fixed_by', 'Fixed By:') !!}
    {!! Form::text('fixed_by', null, ['class' => 'form-control']) !!}
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