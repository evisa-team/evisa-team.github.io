<!-- Lang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lang', 'Language:') !!}
    {{ Form::select('lang', ['ar' => 'Arabic', 'en' => 'English'], null, ['class' => 'form-control', 'placeholder' => 'Choose language']) }}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::file('url', ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Text:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.sliderImages.index') !!}" class="btn btn-default">Cancel</a>
</div>
