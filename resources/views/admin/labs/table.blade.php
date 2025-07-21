<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="labs-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Manager Id</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($labs as $lab)
                <tr>
                    <td>{{ $lab->id }}</td>
                    <td>{{ $lab->name }}</td>
                    <td>{{ $lab->manager_id }}</td>
                    <td>{{ $lab->created_at }}</td>
                    <td>{{ $lab->updated_at }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.labs.destroy', $lab->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.labs.show', [$lab->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.labs.edit', [$lab->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $labs])
        </div>
    </div>
</div>
