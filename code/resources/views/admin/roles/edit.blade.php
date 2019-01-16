@extends('layouts.app')
 
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Edit Role</h1>
        <div class="pull-right">
            <a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @if (count($errors) > 0)
            <ul class="alert alert-danger" style="list-style-type: none">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="box box-primary">
            <div class="box-body">
                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('display_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <div class="col-md-3">
                                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    {{ $value->display_name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group col-sm-12" style="margin-top: 20px">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection