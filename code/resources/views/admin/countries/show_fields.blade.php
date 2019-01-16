<!-- Country Name Field -->
<div class="form-group">
    {!! Form::label('country_name', 'Name:') !!}
    <p>{!! $country->country_name !!}</p>
</div>

<!-- Country Name Ar Field -->
<div class="form-group">
    {!! Form::label('country_name_ar', 'Name(Arabic):') !!}
    <p>{!! $country->country_name_ar !!}</p>
</div>

<!-- Country Iso Code Field -->
<div class="form-group">
    {!! Form::label('country_iso_code', 'ISO code:') !!}
    <p>{!! $country->country_iso_code !!}</p>
</div>

<!-- Country Isd Code Field -->
<div class="form-group">
    {!! Form::label('country_isd_code', 'ISD code:') !!}
    <p>{!! $country->country_isd_code !!}</p>
</div>

