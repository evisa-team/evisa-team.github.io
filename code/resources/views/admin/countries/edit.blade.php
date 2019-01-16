@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Country
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($country, ['route' => ['admin.countries.update', $country->country_id], 'method' => 'patch']) !!}

                        @include('admin.countries.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection