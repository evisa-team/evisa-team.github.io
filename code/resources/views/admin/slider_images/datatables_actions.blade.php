{!! Form::open(['route' => ['admin.sliderImages.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    @permission('sliderImages-edit')
    <a href="{{ route('admin.sliderImages.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endpermission

    @permission('sliderImages-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endpermission
</div>
{!! Form::close() !!}
