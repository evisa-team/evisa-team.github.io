<!-- Ref No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ref_no', 'Ref No:') !!}
    {!! Form::text('ref_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Nationality Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nationality', 'Nationality:') !!}
    {!! Form::text('nationality', null, ['class' => 'form-control']) !!}
</div>

<!-- Residence Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('residence_country', 'Residence Country:') !!}
    {!! Form::text('residence_country', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', 'Zipcode:') !!}
    {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- Emergency Contact Person Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emergency_contact_person', 'Emergency Contact Person:') !!}
    {!! Form::text('emergency_contact_person', null, ['class' => 'form-control']) !!}
</div>

<!-- Emergency Contact Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emergency_contact_number', 'Emergency Contact Number:') !!}
    {!! Form::text('emergency_contact_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Person Relation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person_relation_id', 'Contact Person Relation Id:') !!}
    {!! Form::number('contact_person_relation_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Arrival Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arrival_date', 'Arrival Date:') !!}
    {!! Form::date('arrival_date', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Whatsapp Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('whatsapp_number', 'Whatsapp Number:') !!}
    {!! Form::text('whatsapp_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Purpose Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('purpose_id', 'Purpose Id:') !!}
    {!! Form::number('purpose_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Transaction Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_id', 'Transaction Id:') !!}
    {!! Form::text('transaction_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.applications.index') !!}" class="btn btn-default">Cancel</a>
</div>
