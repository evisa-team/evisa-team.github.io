{!! Form::open(['route' => ['admin.purposes.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    @permission('purposes-edit')
    <a href="{{ route('admin.purposes.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endpermission

    @permission('purposes-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endpermission
</div>
{!! Form::close() !!}
