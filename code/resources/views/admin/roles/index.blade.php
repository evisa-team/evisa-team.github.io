@extends('layouts.app')
@section('css')
 <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection
 
@section('content')
<section class="content-header">
    <h1 class="pull-left">Role Management</h1>
        
    @permission('roles-create')
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('roles.create') }}">Create New Role</a>
    </h1>
    @endpermission
</section>
<div class="content">
    <div class="clearfix"></div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="box box-primary">
    <table class="table dataTable no-footer">
        <thead>
        <tr role="row">
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->display_name }}</td>
            <td>{{ $role->description }}</td>
            <td>
                <a href="{{ route('roles.show',$role->id) }}" class='btn btn-default btn-xs'>
                    <i class="glyphicon glyphicon-eye-open"></i>
                </a>
                @permission('roles-edit')
                <a href="{{ route('roles.edit',$role->id) }}" class='btn btn-default btn-xs'>
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
                @endpermission
                @permission('roles-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'onclick' => "return confirm('Are you sure?')"
                    ]) !!}
                    {!! Form::close() !!}
                @endpermission
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    
    {!! $roles->render() !!}
    </div>
</div>
@endsection
