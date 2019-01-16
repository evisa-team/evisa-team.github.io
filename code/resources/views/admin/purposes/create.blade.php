@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Purpose
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.purposes.store']) !!}

                        @include('admin.purposes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
