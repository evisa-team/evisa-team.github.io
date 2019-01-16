<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $application->id !!}</p>
</div>

<!-- Ref No Field -->
<div class="form-group">
    {!! Form::label('ref_no', 'Reference ID:') !!}
    <p>{!! $application->ref_no !!}</p>
</div>

<div class="form-group">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{!! $application->full_name !!}</p>
</div>

<div class="form-group">
    {!! Form::label('nationality', 'Nationality:') !!}
    <p>{!! $application->nationality_name !!}</p>
</div>

<div class="form-group">
    {!! Form::label('residence_country', 'Residence Country:') !!}
    <p>{!! @$application->residenceCountry->country_name !!}</p>
</div>

<div class="form-group">
    {!! Form::label('travel_date', 'Date of Travel:') !!}
    <p>{!! $application->travel_date !!}</p>
</div>

<div class="form-group">
    {!! Form::label('contact_number', 'Contact Number:') !!}
    <p>{!! $application->contact_number !!}</p>
</div>

<div class="form-group">
    {!! Form::label('religion', 'Religion:') !!}
    <p>{!! $application->religion_name !!}</p>
</div>

<div class="form-group">
    {!! Form::label('faith', 'Faith:') !!}
    <p>{!! $application->faith !!}</p>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email Address:') !!}
    <p>{!! $application->email !!}</p>
</div>

<div class="form-group">
    {!! Form::label('contact_address', 'Contact Address:') !!}
    <p>{!! $application->contact_address !!}</p>
</div>

<div class="form-group">
    {!! Form::label('job_title', 'Job title:') !!}
    <p>{!! $application->job_title !!}</p>
</div>

<div class="form-group">
    {!! Form::label('marital_status', 'Marital Status:') !!}
    <p>{!! $application->marital_status_name !!}</p>
</div>

<div class="form-group">
    {!! Form::label('mother_name', 'Name of Mother:') !!}
    <p>{!! $application->mother_name !!}</p>
</div>

<div class="form-group">
    {!! Form::label('passport_number', 'Passport Number:') !!}
    <p>{!! $application->passport_number !!}</p>
</div>

<div class="form-group">
    {!! Form::label('passport_expiry_date', 'Passport Expiry Date:') !!}
    <p>{!! $application->passport_expiry_date !!}</p>
</div>

<div class="form-group">
    {!! Form::label('residency_issue_date', 'Residency Issue Date:') !!}
    <p>{!! $application->residency_issue_date !!}</p>
</div>

<div class="form-group">
    {!! Form::label('residency_expire_date', 'Residency Expiry Date:') !!}
    <p>{!! $application->residency_expire_date !!}</p>
</div>

<div class="form-group">
    {!! Form::label('arrival_city', 'City of Arrival:') !!}
    <p>{!! $application->arrival_city !!}</p>
</div>

<div class="form-group">
    {!! Form::label('arrival_port', 'Port of Arrival:') !!}
    <p>{!! $application->arrival_port !!}</p>
</div>

@if ($application->passport_img)
<div class="form-group">
    {!! Form::label('passport_img', 'Passport Image:') !!}
    <p>
        <a href="{{ url('/') }}/images/{!! $application->passport_img !!}" target="_blank">
            <img src="{{ url('/') }}/images/{!! $application->passport_img !!}" height="100">
        </a>
    </p>
</div>
@endif

@if ($application->picture)
<div class="form-group">
    {!! Form::label('picture', 'Personal Photo:') !!}
    <p>
        <a href="{{ url('/') }}/images/{!! $application->picture !!}" target="_blank">
            <img src="{{ url('/') }}/images/{!! $application->picture !!}" height="100">
        </a>
    </p>
</div>
@endif

@if ($application->residence_img)
<div class="form-group">
    {!! Form::label('residence_img', 'Residency Image:') !!}
    <p>
        <a href="{{ url('/') }}/images/{!! $application->residence_img !!}" target="_blank">
            <img src="{{ url('/') }}/images/{!! $application->residence_img !!}" height="100">
        </a>
    </p>
</div>
@endif

@if ($application->document_1)
<div class="form-group">
    {!! Form::label('document_1', 'Document 1:') !!}
    <p>
        <a href="{{ url('/') }}/images/{!! $application->document_1 !!}" target="_blank">
            View document
        </a>
    </p>
</div>
@endif

@if ($application->document_2)
<div class="form-group">
    {!! Form::label('document_2', 'Document 2:') !!}
    <p>
        <a href="{{ url('/') }}/images/{!! $application->document_2 !!}" target="_blank">
            View document
        </a>
    </p>
</div>
@endif

@if ($application->document_3)
<div class="form-group">
    {!! Form::label('document_3', 'Document 3:') !!}
    <p>
        <a href="{{ url('/') }}/images/{!! $application->document_3 !!}" target="_blank">
            View document
        </a>
    </p>
</div>
@endif

<!-- Transaction Id Field -->
<div class="form-group">
    {!! Form::label('transaction_id', 'Transaction Id:') !!}
    <p>{!! $application->transaction_id !!}</p>
</div>

