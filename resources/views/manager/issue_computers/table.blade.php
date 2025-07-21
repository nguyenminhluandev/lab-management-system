<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="issue-computers-table">
            <thead>
            <tr>
                <th>Issue Id</th>
                <th>Computer Id</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($issueComputers as $issueComputer)
                <tr>
                    <td>{{ $issueComputer->issue_id }}</td>
                    <td>{{ $issueComputer->computer_id }}</td>
                    <td>{{ $issueComputer->created_at }}</td>
                    <td>{{ $issueComputer->updated_at }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['issueComputers.destroy', $issueComputer->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('issueComputers.show', [$issueComputer->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('issueComputers.edit', [$issueComputer->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $issueComputers])
        </div>
    </div>
</div>
