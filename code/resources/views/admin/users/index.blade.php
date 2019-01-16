@extends('layouts.app')
@section('css')
 <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection

@section('content')
<section class="content-header">
    <h1 class="pull-left">Users Management</h1>
        
    @permission('users-create')
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('users.create') }}">Create New User</a>
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
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->roles))
                        @foreach($user->roles as $v)
                            <label class="label label-success">{{ $v->display_name }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a href="{{ route('users.show',$user->id) }}" class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    @permission('users-edit')
                    <a href="{{ route('users.edit',$user->id) }}" class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    @endpermission
                    @permission('roles-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
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
        {!! $data->render() !!}
    </div>
</div>
@endsection