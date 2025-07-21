<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="equipment-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Lab Id</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($equipment as $equipment)
                <tr>
                    <td>{{ $equipment->id }}</td>
                    <td>{{ $equipment->lab_id }}</td>
                    <td>{{ $equipment->name }}</td>
                    <td>{{ $equipment->quantity }}</td>
                    <td>{{ $equipment->status }}</td>
                    <td>{{ $equipment->description }}</td>
                    <td>{{ $equipment->created_at }}</td>
                    <td>{{ $equipment->updated_at }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.equipment.destroy', $equipment->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.equipment.show', [$equipment->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.equipment.edit', [$equipment->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $equipment])
        </div>
    </div>
</div>
