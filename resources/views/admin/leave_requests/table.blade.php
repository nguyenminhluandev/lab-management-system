<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="leave-requests-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Schedule Id</th>
                <th>Teacher Id</th>
                <th>Leave Date</th>
                <th>Makeup Date</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Reason Rejection</th>
                <th>Approved By</th>
                <th>Approved At</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($leaveRequests as $leaveRequest)
                <tr>
                    <td>{{ $leaveRequest->id }}</td>
                    <td>{{ $leaveRequest->schedule_id }}</td>
                    <td>{{ $leaveRequest->teacher_id }}</td>
                    <td>{{ $leaveRequest->leave_date }}</td>
                    <td>{{ $leaveRequest->makeup_date }}</td>
                    <td>{{ $leaveRequest->reason }}</td>
                    <td>{{ $leaveRequest->status }}</td>
                    <td>{{ $leaveRequest->reason_rejection }}</td>
                    <td>{{ $leaveRequest->approved_by }}</td>
                    <td>{{ $leaveRequest->approved_at }}</td>
                    <td>{{ $leaveRequest->created_at }}</td>
                    <td>{{ $leaveRequest->updated_at }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.leaveRequests.destroy', $leaveRequest->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.leaveRequests.show', [$leaveRequest->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.leaveRequests.edit', [$leaveRequest->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $leaveRequests])
        </div>
    </div>
</div>
