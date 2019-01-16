<!-- Lang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lang', 'Language:') !!}
    {{ Form::select('lang', ['ar' => 'Arabic', 'en' => 'English'], null, ['class' => 'form-control', 'placeholder' => 'Choose language']) }}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Validity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('validity', 'Validity:') !!}
    {!! Form::text('validity', null, ['class' => 'form-control']) !!}
</div>

<!-- stay_validity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stay_validity', 'Stay Validity:') !!}
    {!! Form::text('stay_validity', null, ['class' => 'form-control']) !!}
</div>

<!-- Processing Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('processing_time', 'Processing Time:') !!}
    {!! Form::text('processing_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost', 'Cost:') !!}
    {!! Form::number('cost', null, ['class' => 'form-control']) !!}
</div>

<!-- Sort Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort', 'Sort:') !!}
    @if(!empty($sort))
        {!! Form::number('sort', $sort, ['class' => 'form-control']) !!}
    @else
        {!! Form::number('sort', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.visaTypes.index') !!}" class="btn btn-default">Cancel</a>
</div>
