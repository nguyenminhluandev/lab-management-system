<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="computers-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Lab Id</th>
                    <th>Config</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($computers as $computer)
                    <tr>
                        <td>{{ $computer->id }}</td>
                        <td>{{ $computer->lab_id }}</td>
                        <td>{{ $computer->config }}</td>
                        <td>{{ $computer->created_at }}</td>
                        <td>{{ $computer->updated_at }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['admin.computers.destroy', $computer->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('admin.admin.computers.show', [$computer->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.computers.edit', [$computer->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $computers])
        </div>
    </div>
</div>
