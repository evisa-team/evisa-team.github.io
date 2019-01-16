@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Visa Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($visaType, ['route' => ['admin.visaTypes.update', $visaType->id], 'method' => 'patch']) !!}

                        @include('admin.visa_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection