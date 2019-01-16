{!! Form::open(['route' => ['admin.relations.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    @permission('relations-edit')
    <a href="{{ route('admin.relations.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endpermission

    @permission('relations-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endpermission
</div>
{!! Form::close() !!}
