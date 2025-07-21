<!-- Issue Id Field -->
<div class="col-sm-12">
    {!! Form::label('issue_id', 'Issue Id:') !!}
    <p>{{ $issueComputer->issue_id }}</p>
</div>

<!-- Computer Id Field -->
<div class="col-sm-12">
    {!! Form::label('computer_id', 'Computer Id:') !!}
    <p>{{ $issueComputer->computer_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $issueComputer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $issueComputer->updated_at }}</p>
</div>

