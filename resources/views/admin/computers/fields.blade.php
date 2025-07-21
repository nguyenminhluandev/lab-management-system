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

<!-- Config Field -->
<div class="form-group col-sm-6">
    {!! Form::label('config', 'Config:') !!}
    {!! Form::text('config', null, ['class' => 'form-control', 'required']) !!}
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