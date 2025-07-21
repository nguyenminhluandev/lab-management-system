<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="schedules-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Lab Id</th>
                <th>Subject Id</th>
                <th>Teacher Id</th>
                <th>Semester Id</th>
                <th>Date</th>
                <th>Start Period</th>
                <th>End Period</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->lab_id }}</td>
                    <td>{{ $schedule->subject_id }}</td>
                    <td>{{ $schedule->teacher_id }}</td>
                    <td>{{ $schedule->semester_id }}</td>
                    <td>{{ $schedule->date }}</td>
                    <td>{{ $schedule->start_period }}</td>
                    <td>{{ $schedule->end_period }}</td>
                    <td>{{ $schedule->start_time }}</td>
                    <td>{{ $schedule->end_time }}</td>
                    <td>{{ $schedule->created_at }}</td>
                    <td>{{ $schedule->updated_at }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['schedules.destroy', $schedule->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('schedules.show', [$schedule->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('schedules.edit', [$schedule->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $schedules])
        </div>
    </div>
</div>
