<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="issues-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Description</th>
                <th>Reported By</th>
                <th>Reported Date</th>
                <th>Status</th>
                <th>Fixed Date</th>
                <th>Fixed By</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($issues as $issue)
                <tr>
                    <td>{{ $issue->id }}</td>
                    <td>{{ $issue->description }}</td>
                    <td>{{ $issue->reported_by }}</td>
                    <td>{{ $issue->reported_date }}</td>
                    <td>{{ $issue->status }}</td>
                    <td>{{ $issue->fixed_date }}</td>
                    <td>{{ $issue->fixed_by }}</td>
                    <td>{{ $issue->created_at }}</td>
                    <td>{{ $issue->updated_at }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['issues.destroy', $issue->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('issues.show', [$issue->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('issues.edit', [$issue->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $issues])
        </div>
    </div>
</div>
