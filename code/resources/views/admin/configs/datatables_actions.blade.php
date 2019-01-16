<div class='btn-group'>
    @permission('configs-edit')
    <a href="{{ route('admin.configs.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endpermission
</div>
