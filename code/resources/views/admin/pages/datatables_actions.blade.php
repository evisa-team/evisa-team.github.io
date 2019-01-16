<div class='btn-group'>
    <a href="{{ route('admin.pages.show', $id) }}" class='btn btn-primary btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    
    @permission('pages-edit')
    <a href="{{ route('admin.pages.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endpermission
</div>
