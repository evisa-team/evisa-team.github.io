<!-- Lang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lang', 'Language:') !!}
    {{ Form::select('lang', ['ar' => 'Arabic', 'en' => 'English'], null, ['class' => 'form-control', 'placeholder' => 'Choose language']) }}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.purposes.index') !!}" class="btn btn-default">Cancel</a>
</div>