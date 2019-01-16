{!! Form::open(['route' => ['admin.applications.destroy', $id], 'method' => 'delete']) !!}
<div class="input-group-btn">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        @permission('applications-view')
        <li>
            <a href="{{ route('admin.applications.show', $id) }}">View</a>
        </li>
        @endpermission

        @permission('applications-edit')
            @if ($status != '0')
            <li>
                <a href="{{ route('admin.applications.changeStatus', [$id, 'New']) }}">New</a>
            </li>
            @endif
            
            @if ($status != '1')
            <li>
                <a href="{{ route('admin.applications.changeStatus', [$id, 'Approved']) }}">Approve</a>
            </li>
            @endif

            @if ($status != '3')
            <li>
                <a href="{{ route('admin.applications.changeStatus', [$id, 'Completed']) }}">Completed</a>
            </li>
            @endif
            
            @if ($status != '4')
            <li>
                <a href="{{ route('admin.applications.changeStatus', [$id, 'Delivered']) }}">Delivered</a>
            </li>
            @endif

            @if ($status != '2')
            <li>
                <a href="{{ route('admin.applications.changeStatus', [$id, 'Rejected']) }}">Reject</a>
            </li>
            @endif
        @endpermission

        @permission('applications-delete')
        <li>
            <a onclick="if(confirm('Are you sure want to Delete?')){$(this).closest('form').submit();}else{return false;}" href="#">Delete</a>
        </li>
        @endpermission
    </ul>
</div>
{!! Form::close() !!}
