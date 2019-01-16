{!! Form::open(['route' => ['admin.countries.destroy', $country_id], 'method' => 'delete']) !!}
<div class='btn-group'>
    @permission('countries-edit')
    <a href="{{ route('admin.countries.edit', $country_id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endpermission
    
    @permission('countries-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endpermission
</div>
{!! Form::close() !!}
