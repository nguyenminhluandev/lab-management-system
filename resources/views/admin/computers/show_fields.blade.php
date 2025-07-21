<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $computer->id }}</p>
</div>

<!-- Lab Id Field -->
<div class="col-sm-12">
    {!! Form::label('lab_id', 'Lab Id:') !!}
    <p>{{ $computer->lab_id }}</p>
</div>

<!-- Config Field -->
<div class="col-sm-12">
    {!! Form::label('config', 'Config:') !!}
    <p>{{ $computer->config }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $computer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $computer->updated_at }}</p>
</div>

