<li class="{{ Request::is('admin/dashboard*') ? 'active' : '' }}">
    <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-edit"></i><span>Dashboard</span></a>
</li>

@permission('applications-view')
<li class="{{ Request::is('admin/applications*') ? 'active' : '' }}">
    <a href="{!! route('admin.applications.index') !!}"><i class="fa fa-edit"></i><span>Applications</span></a>
</li>
@endpermission

@permission('pages-view')
<li class="{{ Request::is('admin/pages*') ? 'active' : '' }}">
    <a href="{!! route('admin.pages.index') !!}"><i class="fa fa-edit"></i><span>Pages</span></a>
</li>
@endpermission

@permission('countries-view')
<li class="{{ Request::is('admin/countries*') ? 'active' : '' }}">
    <a href="{!! route('admin.countries.index') !!}"><i class="fa fa-edit"></i><span>Countries</span></a>
</li>
@endpermission

@permission('faqs-view')
<li class="{{ Request::is('admin/faqs*') ? 'active' : '' }}">
    <a href="{!! route('admin.faqs.index') !!}"><i class="fa fa-edit"></i><span>FAQ</span></a>
</li>
@endpermission

@permission('visaTypes-view')
<li class="{{ Request::is('admin/visaTypes*') ? 'active' : '' }}">
    <a href="{!! route('admin.visaTypes.index') !!}"><i class="fa fa-edit"></i><span>Visa Types</span></a>
</li>
@endpermission

@permission('relations-view')
<li class="{{ Request::is('admin/relations*') ? 'active' : '' }}">
    <a href="{!! route('admin.relations.index') !!}"><i class="fa fa-edit"></i><span>Relations</span></a>
</li>
@endpermission

@permission('purposes-view')
<li class="{{ Request::is('admin/purposes*') ? 'active' : '' }}">
    <a href="{!! route('admin.purposes.index') !!}"><i class="fa fa-edit"></i><span>Purposes</span></a>
</li>
@endpermission

@permission('sliderImages-view')
<li class="{{ Request::is('admin/sliderImages*') ? 'active' : '' }}">
    <a href="{!! route('admin.sliderImages.index') !!}"><i class="fa fa-edit"></i><span>Slider Images</span></a>
</li>
@endpermission

@permission('configs-view')
<li class="{{ Request::is('admin/configs*') ? 'active' : '' }}">
    <a href="{!! route('admin.configs.index') !!}"><i class="fa fa-edit"></i><span>Config</span></a>
</li>
@endpermission

<li class="treeview {{ Request::is('admin/roles*') || Request::is('admin/users*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-edit"></i><span>Admin permissions</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class='treeview-menu'>
        <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i><span>Roles</span></a>
        </li>
        <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i><span>Users</span></a>
        </li>
    </ul>
</li>

