<!-- Issue Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('issue_id', 'Issue Id:') !!}
    {!! Form::text('issue_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Computer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('computer_id', 'Computer Id:') !!}
    {!! Form::text('computer_id', null, ['class' => 'form-control']) !!}
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