<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="semesters-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Academic Year</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($semesters as $semester)
                <tr>
                    <td>{{ $semester->id }}</td>
                    <td>{{ $semester->name }}</td>
                    <td>{{ $semester->start_date }}</td>
                    <td>{{ $semester->end_date }}</td>
                    <td>{{ $semester->academic_year }}</td>
                    <td>{{ $semester->created_at }}</td>
                    <td>{{ $semester->updated_at }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.semesters.destroy', $semester->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.semesters.show', [$semester->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.semesters.edit', [$semester->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $semesters])
        </div>
    </div>
</div>
