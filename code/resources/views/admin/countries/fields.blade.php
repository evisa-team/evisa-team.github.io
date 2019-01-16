<!-- Country Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_name', 'Name:') !!}
    {!! Form::text('country_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Name Ar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_name_ar', 'Name(Arabic):') !!}
    {!! Form::text('country_name_ar', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Iso Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_iso_code', 'ISO code:') !!}
    {!! Form::text('country_iso_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Isd Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_isd_code', 'ISD code:') !!}
    {!! Form::text('country_isd_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.countries.index') !!}" class="btn btn-default">Cancel</a>
</div>
