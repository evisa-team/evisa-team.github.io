@extends('layouts.app')

@section('css')
<style>
    .select2-dropdown .select2-search__field:focus, .select2-search--inline .select2-search__field:focus {
        border:0;
    }
</style>
@endsection

@section('content')
    <section class="content-header">
        <h1>Create New User</h1>
    </section>
    <div class="content">
        @if (count($errors) > 0)
            <ul class="alert alert-danger" style="list-style-type: none">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Password:</strong>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Confirm Password:</strong>
                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Role:</label>
                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control select2', 'placeholder' => 'Choose Roles', 'multiple')) !!}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-sm-12" style="margin-top: 20px">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection